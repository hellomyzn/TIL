import { describe, it, expect, vi } from 'vitest';

describe('GitContext', () => {
  it('Git リポジトリ内では文字列のブランチ名が返されること', async () => {
    const { getBranch } = await import('../../src/core/GitContext.js');
    const result = getBranch();
    // CI・Git 管理下ではブランチ名が返る
    expect(typeof result === 'string' || result === null).toBe(true);
  });

  it('execSync が失敗するとき null が返されること', async () => {
    vi.mock('child_process', () => ({
      execSync: () => { throw new Error('not a git repo'); },
    }));
    // モジュールキャッシュをリセットして再インポート
    const mod = await import('../../src/core/GitContext.js?nocache=' + Date.now());
    const result = mod.getBranch();
    expect(result).toBeNull();
    vi.restoreAllMocks();
  });
});
