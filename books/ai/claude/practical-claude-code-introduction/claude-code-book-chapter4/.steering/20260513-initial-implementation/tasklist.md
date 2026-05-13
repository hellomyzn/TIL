# 初回実装 タスクリスト

## 進捗凡例
- [x] 未着手
- [x] 完了

---

## フェーズ 1: プロジェクトセットアップ

- [x] 1-1. `package.json` 初期化（`npm init`）
- [x] 1-2. 依存ライブラリのインストール（commander, chalk, nanoid, date-fns, zod）
- [x] 1-3. 開発依存のインストール（typescript, tsup, vitest, eslint, prettier）
- [x] 1-4. `tsconfig.json` 設定（strict: true, ESM, Node20）
- [x] 1-5. `tsup.config.ts` 設定（エントリーポイント・shebang 付きビルド）
- [x] 1-6. `vitest.config.ts` 設定
- [x] 1-7. `.eslintrc.json` / `.prettierrc` 設定
- [x] 1-8. `package.json` の `bin` フィールドに `task` を登録
- [x] 1-9. `.gitignore` 作成

## フェーズ 2: 型定義・スキーマ

- [x] 2-1. `src/types/index.ts` — Task・ScoreBreakdown など共通型を定義
- [x] 2-2. `src/storage/schema.ts` — zod スキーマ定義（TaskSchema, StorageSchema）

## フェーズ 3: Storage レイヤー

- [x] 3-1. `src/storage/Storage.ts` — `load()` 実装（ファイルなし時は空データを返す）
- [x] 3-2. `src/storage/Storage.ts` — `save()` 実装（バックアップ → 一時ファイル → リネーム）
- [x] 3-3. `src/storage/Storage.ts` — `createBackup()` 実装（日次・最大 7 世代）
- [x] 3-4. `tests/storage/Storage.test.ts` — ユニットテスト作成

## フェーズ 4: Core レイヤー

- [x] 4-1. `src/core/GitContext.ts` — `getBranch()` 実装（失敗時は null）
- [x] 4-2. `tests/core/GitContext.test.ts` — ユニットテスト作成
- [x] 4-3. `src/core/ScoringEngine.ts` — `calcScore()` 実装（5 シグナル）
- [x] 4-4. `src/core/ScoringEngine.ts` — `explainScore()` 実装
- [x] 4-5. `tests/core/ScoringEngine.test.ts` — 各シグナルのユニットテスト作成
- [x] 4-6. `src/core/TaskManager.ts` — `create()` 実装
- [x] 4-7. `src/core/TaskManager.ts` — `list()` 実装
- [x] 4-8. `src/core/TaskManager.ts` — `get()` 実装（存在しなければ UserError）
- [x] 4-9. `src/core/TaskManager.ts` — `update()` 実装
- [x] 4-10. `src/core/TaskManager.ts` — `delete()` 実装
- [x] 4-11. `tests/core/TaskManager.test.ts` — ユニットテスト作成

## フェーズ 5: CLI レイヤー

- [x] 5-1. `src/cli/commands/add.ts` — `task add` 実装
- [x] 5-2. `src/cli/commands/list.ts` — `task`（一覧）実装
- [x] 5-3. `src/cli/commands/done.ts` — `task done` 実装
- [x] 5-4. `src/cli/commands/delete.ts` — `task delete` 実装
- [x] 5-5. `src/cli/commands/show.ts` — `task show` 実装
- [x] 5-6. `src/cli/commands/edit.ts` — `task edit` 実装
- [x] 5-7. `src/cli/commands/why.ts` — `task why` 実装
- [x] 5-8. `src/cli/commands/now.ts` — `task now` 実装
- [x] 5-9. `src/cli/index.ts` — コマンド登録・グローバルエラーハンドリング

## フェーズ 6: 品質チェック

- [x] 6-1. `npm run typecheck` が通ること（`tsc --noEmit`）
- [x] 6-2. `npm run lint` が通ること
- [x] 6-3. `npm run test` が通ること（全テスト pass）
- [x] 6-4. `npm run build` が通ること（tsup）
- [x] 6-5. `npm install -g .` でインストールし、手動動作確認
  - [x] `task add "Test task" --tag=test --priority=2`
  - [x] `task`（スコア順一覧）
  - [x] `task done <id>`
  - [x] `task why <id>`
  - [x] `task now`
  - [x] Git リポジトリ内外での動作確認
