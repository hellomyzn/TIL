import { differenceInDays } from 'date-fns';
import { Task, ScoreBreakdown } from '../types/index.js';

export interface ScoringContext {
  currentBranch: string | null;
  now?: Date;
}

export function calcScore(task: Task, ctx: ScoringContext): number {
  return explainScore(task, ctx).total;
}

export function explainScore(task: Task, ctx: ScoringContext): ScoreBreakdown {
  const now = ctx.now ?? new Date();

  const manual = calcManual(task.priority);
  const branch = calcBranch(task.branch, ctx.currentBranch);
  const freshness = calcFreshness(task.createdAt, now);
  const dueDateScore = calcDueDate(task.dueDate, now);
  const blocker = 0; // MVP ではブロッカー機能なし

  const total = manual + branch + freshness + dueDateScore + blocker;

  return { total, manual, branch, freshness, dueDate: dueDateScore, blocker };
}

function calcManual(priority: Task['priority']): number {
  const map: Record<number, number> = { 1: 10, 2: 20, 3: 30 };
  return map[priority] ?? 10;
}

function calcBranch(taskBranch: string | null, currentBranch: string | null): number {
  if (!taskBranch || !currentBranch) return 0;
  return taskBranch === currentBranch ? 25 : 0;
}

function calcFreshness(createdAt: string, now: Date): number {
  const days = differenceInDays(now, new Date(createdAt));
  if (days <= 7) return 20;
  if (days <= 14) return 10;
  return 0;
}

function calcDueDate(dueDate: string | null, now: Date): number {
  if (!dueDate) return 0;
  const days = differenceInDays(new Date(dueDate), now);
  if (days <= 0) return 15;
  if (days <= 3) return 10;
  if (days <= 7) return 5;
  return 0;
}
