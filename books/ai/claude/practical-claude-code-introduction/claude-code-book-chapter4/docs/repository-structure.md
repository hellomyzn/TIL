# リポジトリ構造定義書

## 全体構成

```
devtask/
├── src/                        # ソースコード
│   ├── cli/                    # CLI レイヤー
│   │   ├── index.ts            # エントリーポイント・コマンド登録
│   │   ├── commands/           # コマンド実装
│   │   │   ├── add.ts
│   │   │   ├── list.ts
│   │   │   ├── done.ts
│   │   │   ├── delete.ts
│   │   │   ├── show.ts
│   │   │   ├── edit.ts
│   │   │   ├── why.ts
│   │   │   └── now.ts
│   │   └── format/             # 出力整形
│   │       ├── table.ts        # 一覧テーブル
│   │       └── score.ts        # スコア表示
│   ├── core/                   # コアロジック（CLI に依存しない）
│   │   ├── TaskManager.ts      # タスク CRUD
│   │   ├── ScoringEngine.ts    # スコア計算
│   │   └── GitContext.ts       # Git 情報取得
│   ├── storage/                # ストレージレイヤー
│   │   ├── Storage.ts          # JSON 読み書き・バックアップ
│   │   └── schema.ts           # zod スキーマ定義
│   └── types/
│       └── index.ts            # 共通型定義
├── tests/                      # テスト
│   ├── core/
│   │   ├── TaskManager.test.ts
│   │   ├── ScoringEngine.test.ts
│   │   └── GitContext.test.ts
│   ├── storage/
│   │   └── Storage.test.ts
│   └── fixtures/               # テスト用固定データ
│       └── tasks.json
├── docs/                       # 永続的ドキュメント
│   ├── product-requirements.md
│   ├── functional-design.md
│   ├── architecture.md
│   ├── repository-structure.md
│   ├── development-guidelines.md
│   └── glossary.md
├── .steering/                  # 作業単位のドキュメント
│   └── 20260513-initial-implementation/
│       ├── requirements.md
│       ├── design.md
│       └── tasklist.md
├── .github/
│   └── workflows/
│       └── ci.yml              # CI（lint・型チェック・テスト）
├── package.json
├── tsconfig.json
├── tsup.config.ts              # ビルド設定
├── vitest.config.ts            # テスト設定
├── .eslintrc.json
├── .prettierrc
├── .gitignore
├── LICENSE
└── README.md
```

---

## ディレクトリの役割

### `src/cli/`

ユーザーインターフェース層。commander.js のコマンド定義・引数パース・出力整形のみを担う。ビジネスロジックは持たず、すべて `src/core/` に委譲する。

### `src/cli/commands/`

コマンド 1 つにつきファイル 1 つ。各ファイルは commander.js の `Command` オブジェクトを default export する。

```typescript
// 構造の例
export default new Command('add')
  .argument('<title>')
  .option('--tag <tags>', ...)
  .action(async (title, options) => {
    // core を呼ぶだけ。ロジックをここに書かない。
  });
```

### `src/cli/format/`

ターミナル出力の整形ロジック。chalk によるカラーリング、テーブル整形、スコア表示など。テスタビリティのために純粋関数として実装する。

### `src/core/`

ビジネスロジック層。CLI・ストレージに依存しない純粋なロジックのみを持つ。このレイヤーは単体テストが容易でなければならない。

| ファイル | 責務 |
|---|---|
| `TaskManager.ts` | タスクの作成・更新・削除・検索 |
| `ScoringEngine.ts` | スコア計算・スコア根拠の生成 |
| `GitContext.ts` | Git コマンドの実行・結果のパース |

### `src/storage/`

永続化層。ファイルの読み書きとバックアップ管理のみを担う。`schema.ts` で zod スキーマを定義し、読み込み時に必ずバリデーションを通す。

### `src/types/`

プロジェクト全体で使用する型定義。`Task`・`SnoozeCondition`・`SessionLog` などの共通インターフェースを集約する。

### `tests/`

`src/` のディレクトリ構造をミラーリングする。テストファイルは `*.test.ts` で命名する。

### `tests/fixtures/`

テスト用の固定データ（JSON ファイルなど）を配置する。テストコード内にインラインでデータを書かず、ここから読み込む。

---

## ファイル配置ルール

- **1 ファイル 1 責務**: ファイルが複数の責務を持ち始めたら分割を検討する
- **コマンドと実装の分離**: `src/cli/commands/` はコマンド定義のみ。ロジックは `src/core/` に書く
- **型は `src/types/` に集約**: 複数ファイルにまたがる型はすべて `src/types/index.ts` からエクスポートする
- **テストはソースと対応**: `src/core/TaskManager.ts` のテストは `tests/core/TaskManager.test.ts` に書く
- **ドキュメントはコードに含めない**: JSDoc などのインラインドキュメントは最小限にとどめ、詳細は `docs/` に書く
