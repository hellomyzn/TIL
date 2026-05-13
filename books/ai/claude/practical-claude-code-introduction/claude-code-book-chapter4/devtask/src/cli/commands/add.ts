import { Command } from 'commander';
import chalk from 'chalk';
import { TaskManager } from '../../core/TaskManager.js';
import { Storage } from '../../storage/Storage.js';
import { Priority } from '../../types/index.js';

export default new Command('add')
  .description('Add a new task')
  .argument('<title>', 'Task title')
  .option('-p, --priority <level>', 'Priority: 1=low, 2=medium, 3=high', '2')
  .option('-t, --tag <tags>', 'Comma-separated tags (e.g. bug,auth)')
  .option('-d, --due <date>', 'Due date (YYYY-MM-DD)')
  .action(async (title: string, options: { priority: string; tag?: string; due?: string }) => {
    const manager = new TaskManager(new Storage());
    const priority = parseInt(options.priority, 10) as Priority;

    if (![1, 2, 3].includes(priority)) {
      process.stderr.write(chalk.red('Priority must be 1, 2, or 3\n'));
      process.exit(1);
    }

    const task = await manager.create({
      title,
      priority,
      tags: options.tag ? options.tag.split(',').map((t) => t.trim()) : [],
      dueDate: options.due ?? null,
    });

    process.stdout.write(chalk.green(`✓ Added [${task.id}] ${task.title}\n`));
  });
