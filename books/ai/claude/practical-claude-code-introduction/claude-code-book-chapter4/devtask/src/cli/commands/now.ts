import { Command } from 'commander';
import chalk from 'chalk';
import { TaskManager } from '../../core/TaskManager.js';
import { Storage } from '../../storage/Storage.js';

export default new Command('now')
  .description('Show the single highest-priority task')
  .action(async () => {
    const manager = new TaskManager(new Storage());
    const tasks = await manager.list();
    const top = tasks[0];

    if (!top) {
      process.stdout.write(chalk.dim('  No open tasks.\n'));
      return;
    }

    process.stdout.write(`
  ${chalk.bold.green('▶ Focus on this now')}
  ${chalk.dim('─'.repeat(40))}
  ${chalk.bold(top.title)}
  ${chalk.dim(`[${top.id}]`)}  score: ${top.score}  ${top.tags.map((t) => chalk.cyan(`#${t}`)).join(' ')}
\n`);
  });
