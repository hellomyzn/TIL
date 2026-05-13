# 技術仕様書

## テクノロジースタック

### ランタイム・言語

| 項目 | 選定 | 理由 |
|---|---|---|
| 言語 | TypeScript | 型安全性・エコシステムの豊富さ・開発者への親しみやすさ |
| ランタイム | Node.js 20 LTS | npm 配布との親和性・ファイルシステム操作の容易さ |

### 主要ライブラリ

| ライブラリ | 用途 |
|---|---|
| [commander.js](https://github.com/tj/commander.js) | CLI コマンドパース |
| [chalk](https://github.com/chalk/chalk) | ターミナル出力のカラーリング |
| [nanoid](https://github.com/ai/nanoid) | タスク ID 生成 |
| [date-fns](https://date-fns.org/) | 日時計算（期限・鮮度スコア） |
| [zod](https://zod.dev/) | JSON データのバリデーション・型生成 |
| [vitest](https://vitest.dev/) | ユニットテスト |

### 開発ツール

| ツール | 用途 |
|---|---|
| ESLint + Prettier | コード品質・フォーマット統一 |
| tsx | TypeScript の直接実行（開発時） |
| tsup | バンドル・ビルド（配布用） |

---

## システム構成

```
┌──────────────────────────────────────────┐
│  ユーザー（ターミナル）                    │
│  $ task add "Fix bug" --tag=bug          │
└──────────────────┬───────────────────────┘
                   │ stdin / stdout
┌──────────────────▼───────────────────────┐
│  CLI Layer  (src/cli/)                   │
│  - コマンド定義（commander.js）            │
│  - 引数・オプションのバリデーション          │
│  - 出力フォーマット                        │
└──────────────────┬───────────────────────┘
                   │
┌──────────────────▼───────────────────────┐
│  Core Layer  (src/core/)                 │
│  ┌─────────────┐  ┌──────────────────┐  │
│  │TaskManager  │  │ ScoringEngine    │  │
│  │- create     │  │ - calcScore()    │  │
│  │- update     │  │ - explainScore() │  │
│  │- delete     │  └──────────────────┘  │
│  │- list       │  ┌──────────────────┐  │
│  └─────────────┘  │ GitContext       │  │
│                   │ - getBranch()    │  │
│                   │ - getChangedFiles│  │
│                   └──────────────────┘  │
└──────────────────┬───────────────────────┘
                   │
┌──────────────────▼───────────────────────┐
│  Storage Layer  (src/storage/)           │
│  - JSON 読み書き                          │
│  - バックアップ管理                        │
│  - zod によるデータ検証                    │
└──────────────────────────────────────────┘
         │
         ▼
   ~/.devtask/tasks.json
   ~/.devtask/backups/
```

---

## ディレクトリ構成（src/）

```
src/
├── cli/
│   ├── index.ts          # エントリーポイント・コマンド登録
│   ├── commands/
│   │   ├── add.ts        # task add
│   │   ├── list.ts       # task（一覧）
│   │   ├── done.ts       # task done
│   │   ├── delete.ts     # task delete
│   │   ├── show.ts       # task show
│   │   ├── edit.ts       # task edit
│   │   ├── why.ts        # task why
│   │   ├── snooze.ts     # task snooze（v2）
│   │   ├── focus.ts      # task focus（v2）
│   │   └── now.ts        # task now
│   └── format/
│       ├── table.ts      # 一覧テーブル整形
│       └── score.ts      # スコア表示整形
├── core/
│   ├── TaskManager.ts    # タスク CRUD ロジック
│   ├── ScoringEngine.ts  # スコア計算ロジック
│   └── GitContext.ts     # Git 情報取得
├── storage/
│   ├── Storage.ts        # JSON 読み書き・バックアップ
│   └── schema.ts         # zod スキーマ定義
└── types/
    └── index.ts          # 共通型定義
```

---

## 技術的制約と要件

### Node.js バージョン

- **最小要件**: Node.js 18（LTS）
- **推奨**: Node.js 20（LTS）
- ESM（ES Modules）を採用し、CommonJS との混在を避ける

### ファイルシステム

- タスクデータは `~/.devtask/tasks.json` に保存
- 書き込みは必ず「バックアップ作成 → 一時ファイルに書き込み → リネーム」の順で行い、データ破損を防ぐ
- バックアップは日次で最大 7 世代保持し、古いものは自動削除

### Git 連携

- `child_process.execSync` で Git コマンドを実行
- Git 管理外ディレクトリでは例外をキャッチして `null` を返し、呼び出し元でゼロスコアとして扱う
- Git コマンドのタイムアウトは 1,000ms

### エラーハンドリング方針

- ユーザー起因エラー（存在しない ID など）: 分かりやすいメッセージを stderr に出力して exit code 1
- システムエラー（ファイル読み書き失敗など）: エラーメッセージと復旧手順を stderr に出力して exit code 2
- 予期しない例外: スタックトレースを表示して exit code 3

---

## パフォーマンス要件

| 指標 | 目標値 | 条件 |
|---|---|---|
| `task` 起動〜表示 | 500ms 以内 | タスク 1,000 件以下 |
| `task add` 完了 | 200ms 以内 | ─ |
| Git コンテキスト取得 | 100ms 以内 | タイムアウト 1,000ms |

スコア計算はインメモリで完結するため、タスク件数が 1,000 件程度であれば計算コストは無視できる。

---

## 配布・インストール

### v1（npm）

```bash
npm install -g devtask
```

- `tsup` でシングルファイルに bundle してから npm publish
- Node.js 18+ が必要

### 将来（v2）

- Homebrew formula（`brew install devtask`）
- GitHub Releases でのプリビルドバイナリ配布（[pkg](https://github.com/vercel/pkg) または [bun compile](https://bun.sh/docs/bundler/executables)）
