import { Command } from 'commander';
import chalk from 'chalk';
import { TaskManager } from '../../core/TaskManager.js';
import { Storage } from '../../storage/Storage.js';

export default new Command('delete')
  .description('Delete a task')
  .argument('<id>', 'Task ID')
  .action(async (id: string) => {
    const manager = new TaskManager(new Storage());
    await manager.delete(id);
    process.stdout.write(chalk.green(`✓ Deleted task ${id}\n`));
  });
