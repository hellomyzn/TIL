import { promises as fs } from 'fs';
import path from 'path';
import os from 'os';
import { Task, SystemError } from '../types/index.js';
import { StorageSchema, type StorageData } from './schema.js';

const MAX_BACKUPS = 7;

export class Storage {
  private dataPath: string;
  private backupDir: string;

  constructor(dataDir = path.join(os.homedir(), '.devtask')) {
    this.dataPath = path.join(dataDir, 'tasks.json');
    this.backupDir = path.join(dataDir, 'backups');
  }

  async load(): Promise<Task[]> {
    try {
      const raw = await fs.readFile(this.dataPath, 'utf-8');
      const parsed = StorageSchema.parse(JSON.parse(raw));
      return parsed.tasks as Task[];
    } catch (e) {
      if ((e as { code?: string }).code === 'ENOENT') {
        return [];
      }
      throw new SystemError(`Failed to load tasks: ${(e as Error).message}`);
    }
  }

  async save(tasks: Task[]): Promise<void> {
    try {
      await this.ensureDir();
      await this.createBackup();

      const data: StorageData = { version: 1, tasks };
      const tmpPath = `${this.dataPath}.tmp`;
      await fs.writeFile(tmpPath, JSON.stringify(data, null, 2), 'utf-8');
      await fs.rename(tmpPath, this.dataPath);
    } catch (e) {
      if (e instanceof SystemError) throw e;
      throw new SystemError(`Failed to save tasks: ${(e as Error).message}`);
    }
  }

  private async ensureDir(): Promise<void> {
    await fs.mkdir(path.dirname(this.dataPath), { recursive: true });
    await fs.mkdir(this.backupDir, { recursive: true });
  }

  private async createBackup(): Promise<void> {
    try {
      await fs.access(this.dataPath);
    } catch {
      return;
    }

    const date = new Date().toISOString().slice(0, 10);
    const backupPath = path.join(this.backupDir, `tasks.${date}.json`);
    await fs.copyFile(this.dataPath, backupPath);
    await this.pruneBackups();
  }

  private async pruneBackups(): Promise<void> {
    const files = await fs.readdir(this.backupDir);
    const backups = files
      .filter((f: string) => f.startsWith('tasks.') && f.endsWith('.json'))
      .sort()
      .reverse();

    for (const old of backups.slice(MAX_BACKUPS)) {
      await fs.unlink(path.join(this.backupDir, old));
    }
  }
}
