# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Overview

This is a template repository for the book "Practical Claude Code Introduction". It contains a browser-based breakout game (ブロック崩し) built with vanilla HTML/CSS/JS and no build tooling.

## Development Server

```bash
npx http-server . -p 8080 --cors
```

Open http://127.0.0.1:8080 in a browser to play.

## Architecture

The game is split across two files:

- **`index.html`** — Layout, CSS styling, and HUD elements (`#score`, `#lives`, `#level`, `#message`, `#restart-btn`). Loads `main.js` as a plain script.
- **`main.js`** — All game logic. No modules, no bundler; everything runs in global scope on a single `<canvas>`.

### Game loop (`main.js`)

The loop follows a strict call order each frame: `update()` → `draw()` → `requestAnimationFrame(loop)`.

Key state objects (mutable globals):
- `ball` — position (`x`, `y`), velocity (`dx`, `dy`), radius (`r`)
- `paddle` — position, size, speed
- `bricks[]` — array of brick objects with `alive` flag and `points`
- `score`, `lives`, `level` — scalar game state

Initialization flow: `initGame()` resets all scalars and calls `initLevel()`, which rebuilds `paddle`, `ball`, and `bricks[]`. `initLevel()` is also called on level advance without resetting score/lives.

### Physics

- Ball speed at level N: `4 + (N - 1) * 0.8`
- Paddle reflection uses the hit position ratio to vary `ball.dx`, then derives `ball.dy` from the conserved speed magnitude.
- Brick reflection (`reflectBallFromBrick`) resolves axis by comparing overlap distances on each side.

## DevContainer

The devcontainer (`mcr.microsoft.com/devcontainers/base:bookworm`) installs Node.js, GitHub CLI, and Playwright's Chromium dependencies via `post_create.sh`. Playwright is available for automated browser testing if needed.
