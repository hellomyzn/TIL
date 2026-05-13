import { Command } from 'commander';
import chalk from 'chalk';
import { TaskManager } from '../../core/TaskManager.js';
import { Storage } from '../../storage/Storage.js';

export default new Command('show')
  .description('Show task details')
  .argument('<id>', 'Task ID')
  .action(async (id: string) => {
    const manager = new TaskManager(new Storage());
    const task = await manager.get(id);

    process.stdout.write(`
  ${chalk.bold(task.title)}
  ${chalk.dim('─'.repeat(40))}
  ID:       ${chalk.dim(task.id)}
  Status:   ${task.status === 'done' ? chalk.green('done') : chalk.yellow('open')}
  Priority: ${task.priority}
  Score:    ${task.score}
  Tags:     ${task.tags.length ? task.tags.map((t) => `#${t}`).join(', ') : chalk.dim('none')}
  Branch:   ${task.branch ?? chalk.dim('none')}
  Due:      ${task.dueDate ?? chalk.dim('none')}
  Created:  ${new Date(task.createdAt).toLocaleString()}
  Updated:  ${new Date(task.updatedAt).toLocaleString()}
\n`);
  });
