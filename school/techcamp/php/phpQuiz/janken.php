<?php

function janken() {
  echo "[0]:グー\n[1]:チョキ\n[2]:パー\n";
  $player_hand = trim(fgets(STDIN));

  $program_hand = rand(0, 2);

  $jankens = array("グー", "チョキ", "パー");

  echo "あなたの手:{$jankens[$player_hand]}, わたしの手:{$jankens[$program_hand]}\n";

  if ($player_hand == $program_hand) {
    echo "あいこで\n";
    return true;
  }
  else if (($player_hand == 0 && $program_hand == 1) || ($player_hand == 1 && $program_hand == 2) ||($player_hand == 2 && $program_hand == 0)) {
    echo "あなたの勝ちです\n";
    return false;
  }
  else {
    echo "あなたの負けです\n";
    return false;
  }
}

$next_game = true;

echo "最初はグー、じゃんけん...\n";

while ($next_game) {
  $next_game = janken();
}

?>
