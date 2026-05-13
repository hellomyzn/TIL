const canvas = document.getElementById('gameCanvas');
const ctx = canvas.getContext('2d');

const W = canvas.width;
const H = canvas.height;

// --- 定数 ---
const PADDLE_H = 12;
const PADDLE_W = 80;
const BALL_R = 8;
const BRICK_ROWS = 5;
const BRICK_COLS = 8;
const BRICK_W = 52;
const BRICK_H = 18;
const BRICK_PAD = 4;
const BRICK_OFFSET_X = (W - (BRICK_COLS * (BRICK_W + BRICK_PAD) - BRICK_PAD)) / 2;
const BRICK_OFFSET_Y = 60;

const BRICK_COLORS = ['#e94560', '#f4a261', '#e9c46a', '#2a9d8f', '#457b9d'];

// --- ゲーム状態 ---
let score, lives, level;
let bricks, ball, paddle;
let animId;
let gameOver, gameWon;
let keys = {};

function initGame() {
  score = 0;
  lives = 3;
  level = 1;
  gameOver = false;
  gameWon = false;
  updateHUD();
  initLevel();
}

function initLevel() {
  paddle = {
    x: W / 2 - PADDLE_W / 2,
    y: H - 40,
    w: PADDLE_W,
    h: PADDLE_H,
    speed: 6,
  };

  const speed = 4 + (level - 1) * 0.8;
  ball = {
    x: W / 2,
    y: H - 60,
    r: BALL_R,
    dx: speed * (Math.random() < 0.5 ? 1 : -1),
    dy: -speed,
  };

  bricks = [];
  for (let r = 0; r < BRICK_ROWS; r++) {
    for (let c = 0; c < BRICK_COLS; c++) {
      bricks.push({
        x: BRICK_OFFSET_X + c * (BRICK_W + BRICK_PAD),
        y: BRICK_OFFSET_Y + r * (BRICK_H + BRICK_PAD),
        w: BRICK_W,
        h: BRICK_H,
        alive: true,
        color: BRICK_COLORS[r % BRICK_COLORS.length],
        points: (BRICK_ROWS - r) * 10,
      });
    }
  }
}

function updateHUD() {
  document.getElementById('score').textContent = score;
  document.getElementById('lives').textContent = lives;
  document.getElementById('level').textContent = level;
}

// --- 入力 ---
document.addEventListener('keydown', e => { keys[e.key] = true; });
document.addEventListener('keyup', e => { keys[e.key] = false; });

canvas.addEventListener('mousemove', e => {
  const rect = canvas.getBoundingClientRect();
  const mx = e.clientX - rect.left;
  paddle.x = Math.max(0, Math.min(W - paddle.w, mx - paddle.w / 2));
});

// --- 衝突検出 ---
function ballHitsBrick(brick) {
  return (
    ball.x + ball.r > brick.x &&
    ball.x - ball.r < brick.x + brick.w &&
    ball.y + ball.r > brick.y &&
    ball.y - ball.r < brick.y + brick.h
  );
}

function reflectBallFromBrick(brick) {
  const overlapLeft  = (ball.x + ball.r) - brick.x;
  const overlapRight = (brick.x + brick.w) - (ball.x - ball.r);
  const overlapTop   = (ball.y + ball.r) - brick.y;
  const overlapBot   = (brick.y + brick.h) - (ball.y - ball.r);
  const minH = Math.min(overlapLeft, overlapRight);
  const minV = Math.min(overlapTop, overlapBot);
  if (minH < minV) {
    ball.dx = -ball.dx;
  } else {
    ball.dy = -ball.dy;
  }
}

// --- 更新 ---
function update() {
  // パドル移動
  if ((keys['ArrowLeft'] || keys['a']) && paddle.x > 0) {
    paddle.x -= paddle.speed;
  }
  if ((keys['ArrowRight'] || keys['d']) && paddle.x + paddle.w < W) {
    paddle.x += paddle.speed;
  }

  // ボール移動
  ball.x += ball.dx;
  ball.y += ball.dy;

  // 壁反射
  if (ball.x - ball.r < 0) { ball.x = ball.r; ball.dx = Math.abs(ball.dx); }
  if (ball.x + ball.r > W) { ball.x = W - ball.r; ball.dx = -Math.abs(ball.dx); }
  if (ball.y - ball.r < 0) { ball.y = ball.r; ball.dy = Math.abs(ball.dy); }

  // パドル衝突
  if (
    ball.dy > 0 &&
    ball.y + ball.r >= paddle.y &&
    ball.y + ball.r <= paddle.y + paddle.h &&
    ball.x >= paddle.x &&
    ball.x <= paddle.x + paddle.w
  ) {
    // パドルの当たった位置に応じて角度を変える
    const hit = (ball.x - (paddle.x + paddle.w / 2)) / (paddle.w / 2);
    const speed = Math.hypot(ball.dx, ball.dy);
    ball.dx = hit * speed;
    ball.dy = -Math.sqrt(Math.max(1, speed * speed - ball.dx * ball.dx));
    ball.y = paddle.y - ball.r;
  }

  // ブロック衝突
  for (const brick of bricks) {
    if (!brick.alive) continue;
    if (ballHitsBrick(brick)) {
      brick.alive = false;
      reflectBallFromBrick(brick);
      score += brick.points;
      updateHUD();
      break;
    }
  }

  // 全ブロック消去 → 次のレベル
  if (bricks.every(b => !b.alive)) {
    level++;
    if (level > 5) {
      endGame(true);
      return;
    }
    updateHUD();
    initLevel();
    return;
  }

  // ボールが下に落ちた
  if (ball.y - ball.r > H) {
    lives--;
    updateHUD();
    if (lives <= 0) {
      endGame(false);
      return;
    }
    // ボールをリセット
    const speed = 4 + (level - 1) * 0.8;
    ball.x = W / 2;
    ball.y = H - 60;
    ball.dx = speed * (Math.random() < 0.5 ? 1 : -1);
    ball.dy = -speed;
  }
}

function endGame(won) {
  gameOver = true;
  gameWon = won;
  const msg = document.getElementById('message');
  const btn = document.getElementById('restart-btn');
  if (won) {
    msg.textContent = 'クリア！ おめでとう！';
    msg.style.color = '#2a9d8f';
  } else {
    msg.textContent = 'ゲームオーバー';
    msg.style.color = '#e94560';
  }
  btn.style.display = 'inline-block';
}

// --- 描画 ---
function draw() {
  ctx.clearRect(0, 0, W, H);

  // ブロック
  for (const brick of bricks) {
    if (!brick.alive) continue;
    ctx.fillStyle = brick.color;
    ctx.beginPath();
    ctx.roundRect(brick.x, brick.y, brick.w, brick.h, 3);
    ctx.fill();
    ctx.fillStyle = 'rgba(255,255,255,0.15)';
    ctx.beginPath();
    ctx.roundRect(brick.x + 2, brick.y + 2, brick.w - 4, brick.h / 2 - 2, 2);
    ctx.fill();
  }

  // パドル
  const grad = ctx.createLinearGradient(paddle.x, paddle.y, paddle.x, paddle.y + paddle.h);
  grad.addColorStop(0, '#a8dadc');
  grad.addColorStop(1, '#457b9d');
  ctx.fillStyle = grad;
  ctx.beginPath();
  ctx.roundRect(paddle.x, paddle.y, paddle.w, paddle.h, 6);
  ctx.fill();

  // ボール
  const ballGrad = ctx.createRadialGradient(
    ball.x - 2, ball.y - 2, 1,
    ball.x, ball.y, ball.r
  );
  ballGrad.addColorStop(0, '#ffffff');
  ballGrad.addColorStop(1, '#e94560');
  ctx.fillStyle = ballGrad;
  ctx.beginPath();
  ctx.arc(ball.x, ball.y, ball.r, 0, Math.PI * 2);
  ctx.fill();
}

// --- ゲームループ ---
function loop() {
  if (gameOver) return;
  update();
  draw();
  animId = requestAnimationFrame(loop);
}

function restartGame() {
  document.getElementById('message').textContent = '← → キーまたはマウスでパドルを動かす';
  document.getElementById('message').style.color = '#e94560';
  document.getElementById('restart-btn').style.display = 'none';
  cancelAnimationFrame(animId);
  initGame();
  loop();
}

// --- 起動 ---
initGame();
loop();
