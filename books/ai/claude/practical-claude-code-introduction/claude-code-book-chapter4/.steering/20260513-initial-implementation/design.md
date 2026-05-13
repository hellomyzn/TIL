# 初回実装 設計

## 実装アプローチ

TypeScript + Node.js 20 で CLI ツールを実装する。
3 層構造（CLI / Core / Storage）を維持し、各層が独立してテスト可能な状態を保つ。

---

## プロジェクト初期構成

```
devtask/
├── src/
│   ├── cli/
│   │   ├── index.ts
│   │   └── commands/
│   │       ├── add.ts
│   │       ├── list.ts
│   │       ├── done.ts
│   │       ├── delete.ts
│   │       ├── show.ts
│   │       ├── edit.ts
│   │       ├── why.ts
│   │       └── now.ts
│   ├── core/
│   │   ├── TaskManager.ts
│   │   ├── ScoringEngine.ts
│   │   └── GitContext.ts
│   ├── storage/
│   │   ├── Storage.ts
│   │   └── schema.ts
│   └── types/
│       └── index.ts
├── tests/
│   ├── core/
│   │   ├── TaskManager.test.ts
│   │   ├── ScoringEngine.test.ts
│   │   └── GitContext.test.ts
│   └── storage/
│       └── Storage.test.ts
├── package.json
├── tsconfig.json
├── tsup.config.ts
└── vitest.config.ts
```

---

## 各コンポーネントの設計

### `src/types/index.ts`

プロジェクト全体で使う型を定義する。

```typescript
export type TaskStatus = 'open' | 'done';
export type Priority = 1 | 2 | 3;

export interface Task {
  id: string;
  title: string;
  status: TaskStatus;
  priority: Priority;
  score: number;
  tags: string[];
  branch: string | null;
  createdAt: string;   // ISO 8601
  updatedAt: string;   // ISO 8601
  dueDate: string | null;
}

export interface ScoreBreakdown {
  total: number;
  manual: number;      // 手動優先度（max 30）
  branch: number;      // ブランチ一致（max 25）
  freshness: number;   // 鮮度（max 20）
  dueDate: number;     // 期限（max 15）
  blocker: number;     // ブロッカー（max 10）
}
```

### `src/storage/schema.ts`

zod で JSON スキーマを定義し、読み込み時に検証する。

```typescript
import { z } from 'zod';

export const TaskSchema = z.object({
  id: z.string(),
  title: z.string().min(1),
  status: z.enum(['open', 'done']),
  priority: z.union([z.literal(1), z.literal(2), z.literal(3)]),
  score: z.number(),
  tags: z.array(z.string()),
  branch: z.string().nullable(),
  createdAt: z.string(),
  updatedAt: z.string(),
  dueDate: z.string().nullable(),
});

export const StorageSchema = z.object({
  version: z.literal(1),
  tasks: z.array(TaskSchema),
});
```

### `src/storage/Storage.ts`

- `load()`: ファイルを読み込み、zod で検証して返す。ファイルが存在しない場合は空の状態を返す
- `save(tasks)`: バックアップ → 一時ファイル書き込み → リネームの順で保存する

```typescript
// 安全な書き込みの流れ
async save(tasks: Task[]): Promise<void> {
  // 1. バックアップ作成
  await this.createBackup();
  // 2. 一時ファイルに書き込み
  await fs.writeFile(tmpPath, JSON.stringify(data, null, 2));
  // 3. アトミックなリネーム
  await fs.rename(tmpPath, this.dataPath);
}
```

### `src/core/GitContext.ts`

- `getBranch()`: `git rev-parse --abbrev-ref HEAD` を実行して現在のブランチ名を返す
- Git 管理外 or Git 未インストールの場合は `null` を返す（例外を投げない）

```typescript
export function getBranch(): string | null {
  try {
    return execSync('git rev-parse --abbrev-ref HEAD', {
      timeout: 1000,
      stdio: ['pipe', 'pipe', 'pipe'],
    }).toString().trim();
  } catch {
    return null;
  }
}
```

### `src/core/ScoringEngine.ts`

- `calcScore(task, context)`: シグナルを集計してスコアを返す
- `explainScore(task, context)`: `ScoreBreakdown` を返す（`task why` 用）

スコア計算のロジックは純粋関数として実装し、外部状態に依存しない。

### `src/core/TaskManager.ts`

Storage を DI（依存性注入）で受け取り、タスクの CRUD を担う。

```typescript
export class TaskManager {
  constructor(private storage: Storage) {}

  async create(input: CreateTaskInput): Promise<Task> { ... }
  async list(filter?: TaskFilter): Promise<Task[]> { ... }
  async update(id: string, patch: Partial<Task>): Promise<Task> { ... }
  async delete(id: string): Promise<void> { ... }
  async get(id: string): Promise<Task> { ... }  // 存在しなければ UserError
}
```

### `src/cli/index.ts`

commander.js でコマンドを登録し、各 `commands/*.ts` をインポートして `.addCommand()` する。
エラーのグローバルキャッチもここで行う。

---

## データフロー（`task` コマンド実行時）

```
$ task
  │
  ├─ GitContext.getBranch()          → "feat/auth"
  ├─ Storage.load()                  → Task[]
  ├─ ScoringEngine.calcScore() × N   → score を各 Task にセット
  ├─ tasks.sort((a,b) => b.score - a.score)
  └─ format/table.ts                 → ターミナルに出力
```

---

## 影響範囲の分析

初回実装のため既存コードへの影響はなし。
新規でプロジェクトを立ち上げるため、以下の作業が必要。

1. `npm init` でパッケージ初期化
2. 依存ライブラリのインストール
3. `tsconfig.json` / `tsup.config.ts` / `vitest.config.ts` の設定
4. `package.json` の `bin` フィールドに `task` コマンドを登録
