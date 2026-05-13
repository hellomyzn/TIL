import { Command } from 'commander';
import chalk from 'chalk';
import { TaskManager } from '../../core/TaskManager.js';
import { Storage } from '../../storage/Storage.js';
import { getBranch } from '../../core/GitContext.js';
import { Task } from '../../types/index.js';

function formatTags(tags: string[]): string {
  if (tags.length === 0) return '';
  return tags.map((t) => chalk.cyan(`#${t}`)).join(' ');
}

function formatDue(dueDate: string | null): string {
  if (!dueDate) return '';
  const days = Math.ceil((new Date(dueDate).getTime() - Date.now()) / 86400000);
  if (days < 0) return chalk.red('overdue');
  if (days === 0) return chalk.red('today');
  if (days === 1) return chalk.yellow('tomorrow');
  if (days <= 7) return chalk.yellow(`${days}d`);
  return chalk.gray(`${days}d`);
}

function formatPriority(p: Task['priority']): string {
  const map = { 1: chalk.gray('↓'), 2: chalk.white('→'), 3: chalk.red('↑') };
  return map[p];
}

export default new Command('list')
  .description('List open tasks sorted by score')
  .option('-a, --all', 'Include completed tasks')
  .action(async (options: { all?: boolean }) => {
    const manager = new TaskManager(new Storage());
    const tasks = await manager.list(options.all);
    const branch = getBranch();

    const header = branch ? chalk.dim(`  Branch: ${branch}\n`) : '';
    process.stdout.write(header + '\n');

    if (tasks.length === 0) {
      process.stdout.write(chalk.dim('  No tasks. Run `task add "<title>"` to create one.\n'));
      return;
    }

    for (const task of tasks) {
      const status = task.status === 'done' ? chalk.green('✓') : ' ';
      const score = chalk.bold(`[${String(task.score).padStart(2)}]`);
      const id = chalk.dim(task.id);
      const title = task.status === 'done' ? chalk.dim(task.title) : task.title;
      const tags = formatTags(task.tags);
      const due = formatDue(task.dueDate);
      const pri = formatPriority(task.priority);

      const parts = [score, id, pri, title, tags, due].filter(Boolean).join('  ');
      process.stdout.write(`  ${status} ${parts}\n`);
    }

    const open = tasks.filter((t) => t.status === 'open').length;
    const done = tasks.filter((t) => t.status === 'done').length;
    process.stdout.write(chalk.dim(`\n  ${open} open  ${done} done\n`));
  });
