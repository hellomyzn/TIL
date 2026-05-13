import { Command } from 'commander';
import chalk from 'chalk';
import { TaskManager } from '../../core/TaskManager.js';
import { Storage } from '../../storage/Storage.js';

export default new Command('done')
  .description('Mark a task as done')
  .argument('<id>', 'Task ID')
  .action(async (id: string) => {
    const manager = new TaskManager(new Storage());
    const task = await manager.setStatus(id, 'done');
    process.stdout.write(chalk.green(`✓ Done [${task.id}] ${task.title}\n`));
  });
