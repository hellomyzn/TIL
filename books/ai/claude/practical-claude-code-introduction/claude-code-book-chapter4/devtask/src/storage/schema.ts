import { z } from 'zod';

export const TaskSchema = z.object({
  id: z.string(),
  title: z.string().min(1),
  status: z.enum(['open', 'done']),
  priority: z.union([z.literal(1), z.literal(2), z.literal(3)]),
  score: z.number(),
  tags: z.array(z.string()),
  branch: z.string().nullable(),
  createdAt: z.string(),
  updatedAt: z.string(),
  dueDate: z.string().nullable(),
});

export const StorageSchema = z.object({
  version: z.literal(1),
  tasks: z.array(TaskSchema),
});

export type StorageData = z.infer<typeof StorageSchema>;
