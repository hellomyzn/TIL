import { execSync } from 'child_process';

export function getBranch(): string | null {
  try {
    return execSync('git rev-parse --abbrev-ref HEAD', {
      timeout: 1000,
      stdio: ['pipe', 'pipe', 'pipe'],
    })
      .toString()
      .trim();
  } catch {
    return null;
  }
}
