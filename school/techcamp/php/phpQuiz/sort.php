<?php

function input_score() {
  $score = array();
  echo "生徒の名前を入力してください:\n";
  $score["name"] = trim(fgets(STDIN));
  echo "得点を入力してください:\n";
  $score["score"] = trim(fgets(STDIN));

  return $score;
}

function show_all_score($a_scores) {
  $sum = 0;
  $line = "--------------------------\n";
  echo $line;

  $sort_scores = array();

  foreach ($a_scores as $score) {
    $index = 0;

    foreach ($sort_scores as $s_score) {
      if ($score["score"] < $s_score["score"]) {
        $index += 1;
      }
    }

    if (count($sort_scores) == $index) {
      array_push ($sort_scores, $score);
    }
    else {
      $i = 0;
      $new_sort_scores = array();
      foreach ($sort_scores as $sort_score) {
        if ($i == $index) {
          array_push ($new_sort_scores, $score);
        }
        array_push ($new_sort_scores, $sort_score);
        $i += 1;
      }
      $sort_scores = $new_sort_scores;
    }
  }

  foreach ($sort_scores as $score) {
    echo "{$score["name"]} : {$score["score"]}点\n";
    $sum += $score["score"];
  }

  echo $line, PHP_EOL;
  echo "平均得点 : " . $sum / count($a_scores) . "点\n";
}

$scores = array();
while (true) {
  echo "得点を入力しますか？:[0]yes [1]no\n";
  $input = trim(fgets(STDIN));

  if ($input == 0) {
    array_push ($scores, input_score());
  }
  else if ($input == 1) {
    show_all_score($scores);
    exit;
  }
}


/*
sort関数を使った場合
*/

// function input_score() {
//   $score = array();
//   echo "生徒の名前を入力してください:\n";
//   $score["name"] = trim(fgets(STDIN));
//   echo "得点を入力してください:\n";
//   $score["score"] = trim(fgets(STDIN));
//
//   return $score;
// }
//
// function show_all_score($a_scores) {
//   $sum = 0;
//   $line = "--------------------------\n";
//   echo $line;
//
//   foreach ($a_scores as $key => $value) {
//     $sort[$key] = $value["score"];
//   }
//
//   array_multisort ($sort, SORT_DESC, $a_scores);
//   foreach ($a_scores as $score) {
//     echo "{$score["name"]} : {$score["score"]}点\n";
//     $sum += $score["score"];
//   }
//
//   echo $line;
//   echo "平均得点 : " . $sum / count($a_scores) . "点\n";
// }
//
// $scores = array();
// while (true) {
//   echo "得点を入力しますか？:[0]yes [1]no\n";
//   $input = trim(fgets(STDIN));
//
//   if ($input == 0) {
//     array_push ($scores, input_score());
//   }
//   else if ($input == 1) {
//     show_all_score($scores);
//     exit;
//   }
// }

?>
