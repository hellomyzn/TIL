import { describe, it, expect, beforeEach, vi } from 'vitest';
import { TaskManager } from '../../src/core/TaskManager.js';
import { Storage } from '../../src/storage/Storage.js';
import { Task, UserError } from '../../src/types/index.js';

vi.mock('../../src/core/GitContext.js', () => ({
  getBranch: () => 'main',
}));

function createMockStorage(initial: Task[] = []): Storage {
  let tasks: Task[] = [...initial];
  return {
    load: vi.fn(async () => [...tasks]),
    save: vi.fn(async (updated: Task[]) => { tasks = [...updated]; }),
  } as unknown as Storage;
}

describe('TaskManager', () => {
  let manager: TaskManager;
  let storage: Storage;

  beforeEach(() => {
    storage = createMockStorage();
    manager = new TaskManager(storage);
  });

  describe('create', () => {
    it('タスクが作成されて保存されること', async () => {
      const task = await manager.create({ title: 'Fix bug', priority: 3, tags: ['bug'] });
      expect(task.title).toBe('Fix bug');
      expect(task.priority).toBe(3);
      expect(task.tags).toEqual(['bug']);
      expect(task.status).toBe('open');
      expect(task.id).toBeDefined();
      expect(storage.save).toHaveBeenCalledOnce();
    });

    it('priority を省略すると 2 がデフォルトになること', async () => {
      const task = await manager.create({ title: 'Task' });
      expect(task.priority).toBe(2);
    });
  });

  describe('list', () => {
    it('open タスクのみがスコア降順で返されること', async () => {
      storage = createMockStorage([
        { id: 'a', title: 'Low', status: 'open', priority: 1, score: 0, tags: [], branch: null, createdAt: new Date().toISOString(), updatedAt: new Date().toISOString(), dueDate: null },
        { id: 'b', title: 'High', status: 'open', priority: 3, score: 0, tags: [], branch: null, createdAt: new Date().toISOString(), updatedAt: new Date().toISOString(), dueDate: null },
        { id: 'c', title: 'Done', status: 'done', priority: 3, score: 0, tags: [], branch: null, createdAt: new Date().toISOString(), updatedAt: new Date().toISOString(), dueDate: null },
      ]);
      manager = new TaskManager(storage);

      const tasks = await manager.list();
      expect(tasks.length).toBe(2);
      expect(tasks[0].title).toBe('High');
      expect(tasks[1].title).toBe('Low');
    });

    it('includesDone=true のとき完了タスクも含まれること', async () => {
      storage = createMockStorage([
        { id: 'a', title: 'Open', status: 'open', priority: 2, score: 0, tags: [], branch: null, createdAt: new Date().toISOString(), updatedAt: new Date().toISOString(), dueDate: null },
        { id: 'b', title: 'Done', status: 'done', priority: 2, score: 0, tags: [], branch: null, createdAt: new Date().toISOString(), updatedAt: new Date().toISOString(), dueDate: null },
      ]);
      manager = new TaskManager(storage);

      const tasks = await manager.list(true);
      expect(tasks.length).toBe(2);
    });
  });

  describe('get', () => {
    it('存在する ID のとき該当タスクが返されること', async () => {
      const created = await manager.create({ title: 'Find me' });
      const found = await manager.get(created.id);
      expect(found.title).toBe('Find me');
    });

    it('存在しない ID のとき UserError が投げられること', async () => {
      await expect(manager.get('nonexistent')).rejects.toThrow(UserError);
    });
  });

  describe('update', () => {
    it('タスクのフィールドが更新されること', async () => {
      const created = await manager.create({ title: 'Old title' });
      const updated = await manager.update(created.id, { title: 'New title' });
      expect(updated.title).toBe('New title');
    });

    it('存在しない ID のとき UserError が投げられること', async () => {
      await expect(manager.update('nonexistent', { title: 'x' })).rejects.toThrow(UserError);
    });
  });

  describe('setStatus', () => {
    it('タスクが done 状態になること', async () => {
      const created = await manager.create({ title: 'Do me' });
      const done = await manager.setStatus(created.id, 'done');
      expect(done.status).toBe('done');
    });
  });

  describe('delete', () => {
    it('タスクが削除されること', async () => {
      const created = await manager.create({ title: 'Delete me' });
      await manager.delete(created.id);
      await expect(manager.get(created.id)).rejects.toThrow(UserError);
    });

    it('存在しない ID のとき UserError が投げられること', async () => {
      await expect(manager.delete('nonexistent')).rejects.toThrow(UserError);
    });
  });
});
