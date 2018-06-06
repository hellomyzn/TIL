
<?php

function get_days($year, $month) {
  $month_days = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

  if ($month == 2) {
    if ($year % 4 == 0) {
      if ($year % 100 == 0 && $year % 400 != 0) {
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


echo "年を入力してください : ";
$year = trim(fgets(STDIN));
echo "月を入力してください : ";
$month = trim(fgets(STDIN));

$days = get_days($year, $month);
echo "{$year}年{$month}月は{$days}日間あります\n";

 ?>
