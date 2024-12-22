'use client';

import { Popover } from '@mantine/core';

// No error
export default function Demo() {
  return (
    <Popover>
      <Popover.Target>Target</Popover.Target>
      <Popover.Dropdown>Dropdown</Popover.Dropdown>
    </Popover>
  );
}
