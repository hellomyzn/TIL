import { nanoid } from 'nanoid';
import { Task, CreateTaskInput, UpdateTaskInput, UserError } from '../types/index.js';
import { Storage } from '../storage/Storage.js';
import { calcScore } from './ScoringEngine.js';
import { getBranch } from './GitContext.js';

export class TaskManager {
  constructor(private storage: Storage) {}

  async create(input: CreateTaskInput): Promise<Task> {
    const tasks = await this.storage.load();
    const now = new Date().toISOString();
    const currentBranch = getBranch();

    const task: Task = {
      id: nanoid(8),
      title: input.title,
      status: 'open',
      priority: input.priority ?? 2,
      score: 0,
      tags: input.tags ?? [],
      branch: input.branch ?? currentBranch,
      createdAt: now,
      updatedAt: now,
      dueDate: input.dueDate ?? null,
    };

    task.score = calcScore(task, { currentBranch });
    tasks.push(task);
    await this.storage.save(tasks);
    return task;
  }

  async list(includesDone = false): Promise<Task[]> {
    const tasks = await this.storage.load();
    const currentBranch = getBranch();

    return tasks
      .filter((t) => includesDone || t.status === 'open')
      .map((t) => ({ ...t, score: calcScore(t, { currentBranch }) }))
      .sort((a, b) => b.score - a.score);
  }

  async get(id: string): Promise<Task> {
    const tasks = await this.storage.load();
    const task = tasks.find((t) => t.id === id);
    if (!task) throw new UserError(`Task not found: ${id}`);
    return task;
  }

  async update(id: string, patch: UpdateTaskInput): Promise<Task> {
    const tasks = await this.storage.load();
    const index = tasks.findIndex((t) => t.id === id);
    if (index === -1) throw new UserError(`Task not found: ${id}`);

    const updated: Task = {
      ...tasks[index],
      ...patch,
      updatedAt: new Date().toISOString(),
    };
    updated.score = calcScore(updated, { currentBranch: getBranch() });
    tasks[index] = updated;
    await this.storage.save(tasks);
    return updated;
  }

  async markDone(id: string): Promise<Task> {
    return this.update(id, { title: (await this.get(id)).title });
  }

  async delete(id: string): Promise<void> {
    const tasks = await this.storage.load();
    const index = tasks.findIndex((t) => t.id === id);
    if (index === -1) throw new UserError(`Task not found: ${id}`);
    tasks.splice(index, 1);
    await this.storage.save(tasks);
  }

  async setStatus(id: string, status: Task['status']): Promise<Task> {
    const tasks = await this.storage.load();
    const index = tasks.findIndex((t) => t.id === id);
    if (index === -1) throw new UserError(`Task not found: ${id}`);
    tasks[index] = { ...tasks[index], status, updatedAt: new Date().toISOString() };
    await this.storage.save(tasks);
    return tasks[index];
  }
}
