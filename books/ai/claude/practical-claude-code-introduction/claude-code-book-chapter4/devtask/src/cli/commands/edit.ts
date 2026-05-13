import { Command } from 'commander';
import chalk from 'chalk';
import { TaskManager } from '../../core/TaskManager.js';
import { Storage } from '../../storage/Storage.js';
import { Priority } from '../../types/index.js';

export default new Command('edit')
  .description('Edit a task')
  .argument('<id>', 'Task ID')
  .option('-T, --title <title>', 'New title')
  .option('-p, --priority <level>', 'Priority: 1=low, 2=medium, 3=high')
  .option('-t, --tag <tags>', 'Comma-separated tags')
  .option('-d, --due <date>', 'Due date (YYYY-MM-DD), use "none" to clear')
  .action(
    async (
      id: string,
      options: { title?: string; priority?: string; tag?: string; due?: string },
    ) => {
      const manager = new TaskManager(new Storage());
      const patch: Record<string, unknown> = {};

      if (options.title) patch.title = options.title;
      if (options.priority) patch.priority = parseInt(options.priority, 10) as Priority;
      if (options.tag) patch.tags = options.tag.split(',').map((t) => t.trim());
      if (options.due) patch.dueDate = options.due === 'none' ? null : options.due;

      const task = await manager.update(id, patch);
      process.stdout.write(chalk.green(`✓ Updated [${task.id}] ${task.title}\n`));
    },
  );
