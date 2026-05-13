import { Command } from 'commander';
import chalk from 'chalk';
import { UserError, SystemError } from '../types/index.js';
import addCmd from './commands/add.js';
import listCmd from './commands/list.js';
import doneCmd from './commands/done.js';
import deleteCmd from './commands/delete.js';
import showCmd from './commands/show.js';
import editCmd from './commands/edit.js';
import whyCmd from './commands/why.js';
import nowCmd from './commands/now.js';

const program = new Command();

program
  .name('task')
  .description('Developer-first task management CLI')
  .version('0.1.0')
  .addCommand(addCmd)
  .addCommand(listCmd, { isDefault: true })
  .addCommand(doneCmd)
  .addCommand(deleteCmd)
  .addCommand(showCmd)
  .addCommand(editCmd)
  .addCommand(whyCmd)
  .addCommand(nowCmd);

try {
  await program.parseAsync(process.argv);
} catch (e) {
  if (e instanceof UserError) {
    process.stderr.write(chalk.red(`Error: ${e.message}\n`));
    process.exit(1);
  }
  if (e instanceof SystemError) {
    process.stderr.write(chalk.red(`System error: ${e.message}\n`));
    process.exit(2);
  }
  process.stderr.write(chalk.red(`Unexpected error: ${(e as Error).message}\n`));
  if (process.env['DEBUG']) process.stderr.write((e as Error).stack ?? '');
  process.exit(3);
}
