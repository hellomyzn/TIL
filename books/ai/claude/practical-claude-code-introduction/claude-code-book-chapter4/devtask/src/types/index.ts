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
  createdAt: string;
  updatedAt: string;
  dueDate: string | null;
}

export interface ScoreBreakdown {
  total: number;
  manual: number;
  branch: number;
  freshness: number;
  dueDate: number;
  blocker: number;
}

export interface GitContextInfo {
  branch: string | null;
}

export interface CreateTaskInput {
  title: string;
  priority?: Priority;
  tags?: string[];
  dueDate?: string | null;
  branch?: string | null;
}

export interface UpdateTaskInput {
  title?: string;
  priority?: Priority;
  tags?: string[];
  dueDate?: string | null;
  branch?: string | null;
}

export class UserError extends Error {
  constructor(message: string) {
    super(message);
    this.name = 'UserError';
  }
}

export class SystemError extends Error {
  constructor(message: string) {
    super(message);
    this.name = 'SystemError';
  }
}
