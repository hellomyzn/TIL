<?php

function get_days($year, $month) {
  $days = 0;
  $month_days = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
  if($month == 2) {
    if($year % 4 == 0) {
      if($year % 100 == 0 && $year % 400 != 0) {
        $days = 28;
      }
      else {
        $days = 29;
      }
    }
    else {
      $days = 28;
    }
  }
  else {
    $days = $month_days[$month - 1];
  }

  return $days;
}

function get_week($year, $month, $day) {
  $weeks = array("月", "火", "水", "木", "金", "土", "日");
  $days = 0;

  $year_index = $year - 1;
  while ($year_index > 0) {
    if (get_days($year_index, 2) == 29) {
      $days += 366;
    }
    else {
      $days += 365;
    }
    $year_index -= 1;
  }

  $month_index = $month - 1;
  while ($month_index > 0) {
    $month_days = get_days($year, $month_index);
    $days += $month_days;
    $month_index -= 1;
  }

  $days += $day;
  $anser = $weeks[($days - 1) % 7];
  return $anser;
}


echo "年を入力してください : ";
$year = trim(fgets(STDIN));
echo "月を入力してください : ";
$month = trim(fgets(STDIN));
echo "日を入力してください : ";
$day = trim(fgets(STDIN));

$week = get_week($year, $month, $day);
echo "{$year}年{$month}月{$day}は{$week}曜日です\n";

?>
