import { Command } from 'commander';
import chalk from 'chalk';
import { TaskManager } from '../../core/TaskManager.js';
import { Storage } from '../../storage/Storage.js';
import { getBranch } from '../../core/GitContext.js';
import { explainScore } from '../../core/ScoringEngine.js';

function bar(score: number, max: number): string {
  const filled = Math.round((score / max) * 10);
  return chalk.green('█'.repeat(filled)) + chalk.dim('░'.repeat(10 - filled));
}

export default new Command('why')
  .description('Explain the priority score of a task')
  .argument('<id>', 'Task ID')
  .action(async (id: string) => {
    const manager = new TaskManager(new Storage());
    const task = await manager.get(id);
    const currentBranch = getBranch();
    const breakdown = explainScore(task, { currentBranch });

    process.stdout.write(`
  ${chalk.bold(task.title)}  ${chalk.dim(`[score: ${breakdown.total}]`)}
  ${chalk.dim('─'.repeat(50))}
  ${bar(breakdown.manual, 30)}  ${chalk.white(`[${String(breakdown.manual).padStart(2)}/30]`)}  Manual priority: ${task.priority === 3 ? 'HIGH' : task.priority === 2 ? 'MEDIUM' : 'LOW'}
  ${bar(breakdown.branch, 25)}  ${chalk.white(`[${String(breakdown.branch).padStart(2)}/25]`)}  Branch match: ${task.branch ?? 'none'} (current: ${currentBranch ?? 'none'})
  ${bar(breakdown.freshness, 20)}  ${chalk.white(`[${String(breakdown.freshness).padStart(2)}/20]`)}  Freshness: created ${new Date(task.createdAt).toLocaleDateString()}
  ${bar(breakdown.dueDate, 15)}  ${chalk.white(`[${String(breakdown.dueDate).padStart(2)}/15]`)}  Due date: ${task.dueDate ? new Date(task.dueDate).toLocaleDateString() : 'not set'}
  ${bar(breakdown.blocker, 10)}  ${chalk.white(`[ ${breakdown.blocker}/10]`)}  Blocker: not blocking any task
\n`);
  });
