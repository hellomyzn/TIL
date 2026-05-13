# 開発ガイドライン

## コーディング規約

### 基本方針

- **TypeScript strict モード**を有効にする（`"strict": true`）
- `any` 型の使用を禁止する。型が不明な場合は `unknown` を使い、型ガードで絞り込む
- `null` より `undefined` を優先する（JSON シリアライズ時の挙動を統一するため、任意フィールドは `undefined` を使わず `null` を使う）
- 副作用のある処理（ファイル I/O・Git コマンド実行）は `async/await` で記述する

### 関数・クラス設計

- Core レイヤーの関数は**純粋関数**を基本とし、外部状態への依存を最小化する
- クラスのメソッドが 20 行を超えたら分割を検討する
- `private` メソッドが増えすぎたら責務分割のサインとして扱う

### エラー処理

- ユーザー起因のエラーは `UserError` クラス、システムエラーは `SystemError` クラスとして定義し、catch 側で種別ごとにメッセージを出し分ける
- `try/catch` は CLI レイヤーの最上位でまとめて処理する。Core・Storage レイヤーでは例外をそのまま投げる

```typescript
// 良い例：Core は例外をそのまま投げる
function getTask(id: string): Task {
  const task = tasks.find(t => t.id === id);
  if (!task) throw new UserError(`Task not found: ${id}`);
  return task;
}

// 良い例：CLI の最上位でまとめてキャッチ
try {
  await command.action();
} catch (e) {
  if (e instanceof UserError) {
    console.error(chalk.red(e.message));
    process.exit(1);
  }
  throw e;
}
```

---

## 命名規則

### ファイル名

| 対象 | 規則 | 例 |
|---|---|---|
| クラスファイル | PascalCase | `TaskManager.ts` |
| ユーティリティ・関数ファイル | camelCase | `formatScore.ts` |
| テストファイル | 対象ファイル名 + `.test.ts` | `TaskManager.test.ts` |
| 型定義ファイル | `index.ts` または camelCase | `index.ts` |

### 変数・関数名

| 対象 | 規則 | 例 |
|---|---|---|
| 変数・関数 | camelCase | `calcScore`, `taskList` |
| クラス・型・インターフェース | PascalCase | `Task`, `ScoringEngine` |
| 定数（モジュールスコープ） | UPPER_SNAKE_CASE | `MAX_BACKUP_COUNT` |
| boolean を返す関数 | `is` / `has` プレフィックス | `isExpired`, `hasTag` |
| 非同期関数 | 同期と同じ命名（`Async` サフィックスは付けない） | `loadTasks` |

### ドメイン用語の命名

コード上の命名はすべて `docs/glossary.md` のユビキタス言語に従う。独自の略語や言い換えを使わない。

---

## スタイリング規約

Prettier の設定に従い、フォーマットは自動化する。手動でフォーマットを調整しない。

```json
// .prettierrc
{
  "semi": true,
  "singleQuote": true,
  "printWidth": 100,
  "trailingComma": "all"
}
```

ESLint は以下のルールを必須とする。

- `@typescript-eslint/no-explicit-any`: error
- `@typescript-eslint/no-unused-vars`: error
- `no-console`: warn（CLI の出力は `process.stdout.write` または chalk 経由で行う）

---

## テスト規約

### テスト対象

| レイヤー | 方針 |
|---|---|
| Core | 全パブリックメソッドをユニットテストで網羅する |
| Storage | ファイル I/O を含む結合テストを書く（一時ディレクトリを使用） |
| CLI | コマンドの引数パースのみテストする。出力の細かい文字列は検証しない |

### テストの書き方

- テストの構造は `describe` → `it` の 2 階層を基本とする
- `it` の説明文は「〜すること」の形で書く（例: `'存在しない ID を指定したとき UserError を投げること'`）
- テストデータは `tests/fixtures/` から読み込む。テストコード内にベタ書きしない
- モックは Storage レイヤーへの依存を切るときのみ使用する。Git コマンドは `GitContext` をモックして差し替える

```typescript
// 良い例
describe('ScoringEngine', () => {
  it('ブランチが一致するとき 25 点加算されること', () => {
    const score = calcScore(task, { currentBranch: 'feat/auth' });
    expect(score.branchScore).toBe(25);
  });
});
```

### カバレッジ

- Core レイヤーのカバレッジ 80% 以上を CI で必須とする
- カバレッジを上げるためだけのテストは書かない

---

## Git 規約

### ブランチ命名

```
<type>/<short-description>

例:
  feat/add-scoring-engine
  fix/git-context-timeout
  docs/update-readme
  refactor/split-task-manager
```

### コミットメッセージ

[Conventional Commits](https://www.conventionalcommits.org/) に従う。

```
<type>(<scope>): <subject>

例:
  feat(scoring): add branch match signal
  fix(storage): handle concurrent write race condition
  test(core): add TaskManager unit tests
  docs: update architecture overview
```

| type | 用途 |
|---|---|
| `feat` | 新機能 |
| `fix` | バグ修正 |
| `refactor` | 動作変更を伴わない構造変更 |
| `test` | テストの追加・修正 |
| `docs` | ドキュメントのみの変更 |
| `chore` | ビルド・依存関係の変更 |

### マージ方針

- `main` ブランチへの直接コミットは禁止
- PR を通じたマージのみ許可（CI が通ることを条件とする）
- マージ方法は **Squash merge** を使用し、コミット履歴を整理する

---

## CI チェック項目

`.github/workflows/ci.yml` で以下をすべて通過することを必須とする。

1. `npm run lint` — ESLint
2. `npm run typecheck` — `tsc --noEmit`
3. `npm run test` — vitest（カバレッジ付き）
4. `npm run build` — tsup でビルドが通ること
