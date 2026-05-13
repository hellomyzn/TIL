import { describe, it, expect, beforeEach, afterEach } from 'vitest';
import { promises as fs } from 'fs';
import os from 'os';
import path from 'path';
import { Storage } from '../../src/storage/Storage.js';
import { Task } from '../../src/types/index.js';

function makeTask(id: string): Task {
  return {
    id,
    title: `Task ${id}`,
    status: 'open',
    priority: 2,
    score: 0,
    tags: [],
    branch: null,
    createdAt: new Date().toISOString(),
    updatedAt: new Date().toISOString(),
    dueDate: null,
  };
}

describe('Storage', () => {
  let tmpDir: string;
  let storage: Storage;

  beforeEach(async () => {
    tmpDir = await fs.mkdtemp(path.join(os.tmpdir(), 'devtask-test-'));
    storage = new Storage(tmpDir);
  });

  afterEach(async () => {
    await fs.rm(tmpDir, { recursive: true, force: true });
  });

  it('ファイルが存在しないとき空配列が返されること', async () => {
    const tasks = await storage.load();
    expect(tasks).toEqual([]);
  });

  it('保存したタスクが読み込めること', async () => {
    const tasks = [makeTask('abc'), makeTask('def')];
    await storage.save(tasks);
    const loaded = await storage.load();
    expect(loaded).toHaveLength(2);
    expect(loaded[0].id).toBe('abc');
  });

  it('save するとバックアップファイルが作成されること', async () => {
    await storage.save([makeTask('a')]);
    await storage.save([makeTask('b')]);

    const backupDir = path.join(tmpDir, 'backups');
    const files = await fs.readdir(backupDir);
    expect(files.length).toBeGreaterThanOrEqual(1);
  });

  it('不正な JSON のとき SystemError が投げられること', async () => {
    const dataPath = path.join(tmpDir, 'tasks.json');
    await fs.mkdir(tmpDir, { recursive: true });
    await fs.writeFile(dataPath, 'invalid json');
    const { SystemError } = await import('../../src/types/index.js');
    await expect(storage.load()).rejects.toThrow(SystemError);
  });
});
