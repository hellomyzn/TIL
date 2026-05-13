import { describe, it, expect } from 'vitest';
import { calcScore, explainScore } from '../../src/core/ScoringEngine.js';
import { Task } from '../../src/types/index.js';

const baseTask: Task = {
  id: 'test001',
  title: 'Test task',
  status: 'open',
  priority: 2,
  score: 0,
  tags: [],
  branch: null,
  createdAt: new Date().toISOString(),
  updatedAt: new Date().toISOString(),
  dueDate: null,
};

describe('ScoringEngine', () => {
  describe('calcManual', () => {
    it('priority 1 のとき manual スコアが 10 であること', () => {
      const breakdown = explainScore({ ...baseTask, priority: 1 }, { currentBranch: null });
      expect(breakdown.manual).toBe(10);
    });

    it('priority 2 のとき manual スコアが 20 であること', () => {
      const breakdown = explainScore({ ...baseTask, priority: 2 }, { currentBranch: null });
      expect(breakdown.manual).toBe(20);
    });

    it('priority 3 のとき manual スコアが 30 であること', () => {
      const breakdown = explainScore({ ...baseTask, priority: 3 }, { currentBranch: null });
      expect(breakdown.manual).toBe(30);
    });
  });

  describe('calcBranch', () => {
    it('ブランチが一致するとき 25 点加算されること', () => {
      const task = { ...baseTask, branch: 'feat/auth' };
      const breakdown = explainScore(task, { currentBranch: 'feat/auth' });
      expect(breakdown.branch).toBe(25);
    });

    it('ブランチが一致しないとき 0 点であること', () => {
      const task = { ...baseTask, branch: 'feat/auth' };
      const breakdown = explainScore(task, { currentBranch: 'main' });
      expect(breakdown.branch).toBe(0);
    });

    it('タスクの branch が null のとき 0 点であること', () => {
      const breakdown = explainScore({ ...baseTask, branch: null }, { currentBranch: 'main' });
      expect(breakdown.branch).toBe(0);
    });

    it('currentBranch が null のとき 0 点であること', () => {
      const task = { ...baseTask, branch: 'feat/auth' };
      const breakdown = explainScore(task, { currentBranch: null });
      expect(breakdown.branch).toBe(0);
    });
  });

  describe('calcFreshness', () => {
    it('作成から 7 日以内のとき 20 点であること', () => {
      const now = new Date();
      const createdAt = new Date(now.getTime() - 3 * 24 * 60 * 60 * 1000).toISOString();
      const task = { ...baseTask, createdAt };
      const breakdown = explainScore(task, { currentBranch: null, now });
      expect(breakdown.freshness).toBe(20);
    });

    it('作成から 8〜14 日のとき 10 点であること', () => {
      const now = new Date();
      const createdAt = new Date(now.getTime() - 10 * 24 * 60 * 60 * 1000).toISOString();
      const task = { ...baseTask, createdAt };
      const breakdown = explainScore(task, { currentBranch: null, now });
      expect(breakdown.freshness).toBe(10);
    });

    it('作成から 15 日以上のとき 0 点であること', () => {
      const now = new Date();
      const createdAt = new Date(now.getTime() - 20 * 24 * 60 * 60 * 1000).toISOString();
      const task = { ...baseTask, createdAt };
      const breakdown = explainScore(task, { currentBranch: null, now });
      expect(breakdown.freshness).toBe(0);
    });
  });

  describe('calcDueDate', () => {
    it('期限が今日以前のとき 15 点であること', () => {
      const now = new Date();
      const dueDate = new Date(now.getTime() - 24 * 60 * 60 * 1000).toISOString();
      const task = { ...baseTask, dueDate };
      const breakdown = explainScore(task, { currentBranch: null, now });
      expect(breakdown.dueDate).toBe(15);
    });

    it('期限が 3 日以内のとき 10 点であること', () => {
      const now = new Date();
      const dueDate = new Date(now.getTime() + 2 * 24 * 60 * 60 * 1000).toISOString();
      const task = { ...baseTask, dueDate };
      const breakdown = explainScore(task, { currentBranch: null, now });
      expect(breakdown.dueDate).toBe(10);
    });

    it('期限が 7 日以内のとき 5 点であること', () => {
      const now = new Date();
      const dueDate = new Date(now.getTime() + 5 * 24 * 60 * 60 * 1000).toISOString();
      const task = { ...baseTask, dueDate };
      const breakdown = explainScore(task, { currentBranch: null, now });
      expect(breakdown.dueDate).toBe(5);
    });

    it('dueDate が null のとき 0 点であること', () => {
      const breakdown = explainScore({ ...baseTask, dueDate: null }, { currentBranch: null });
      expect(breakdown.dueDate).toBe(0);
    });
  });

  describe('calcScore', () => {
    it('全シグナルを合算した total が返されること', () => {
      const now = new Date();
      const task: Task = {
        ...baseTask,
        priority: 3,
        branch: 'feat/auth',
        createdAt: new Date(now.getTime() - 24 * 60 * 60 * 1000).toISOString(),
        dueDate: new Date(now.getTime() + 2 * 24 * 60 * 60 * 1000).toISOString(),
      };
      const score = calcScore(task, { currentBranch: 'feat/auth', now });
      expect(score).toBe(30 + 25 + 20 + 10 + 0); // 85
    });
  });
});
