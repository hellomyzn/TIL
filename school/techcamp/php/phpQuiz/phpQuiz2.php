<?php

/*
quiz 1
*/

$name = "田中";
$birth_month = 10;
$birth_day = 10;


echo "My name is {$name}. My birth month plus my birth day is ". ($birth_month + $birth_day) . ".", PHP_EOL;


/*
quiz2
*/

echo floor (1869 / 456 / 2) , PHP_EOL;
echo 5974 % 407, PHP_EOL;
echo (78 + 450) * ( 4 + 36)  , PHP_EOL;
echo 5124 % 9 * (354 - 28) , PHP_EOL;



// quiz3

$ary = array("yuki", 45, array("mana", "kana"), array("name" => "takashi"));
echo $ary[0], PHP_EOL;
print_r( $ary[3]);
echo $ary[2][1], PHP_EOL;



// quiz4
$data = array("name" => "takashi", "score" => array("english" => 46, "math" => 80, "japanese" => 90), "age" => 15);
$total = $data["score"]["english"] + $data["score"]["math"] + $data["score"]["japanese"];

echo $data{"name"},PHP_EOL;
echo $data{"score"}{"math"}, PHP_EOL;
echo "takashi's mark toraled {$total}, the average mark is ". $total / 3, PHP_EOL;


// quiz5

$num = 100;

while($num > 0)
{
  echo $num, PHP_EOL;
  $num --;
}


// quiz6

$ary = array("shoebill", "lungfish", "gibbon");
$ary2 = array(5, 6, 7, 8, 9);
$ary3 = array();

foreach ($ary as $ary)
{
  echo $ary, PHP_EOL;
}

foreach ($ary2 as $ary)
{
  echo $ary + 10 , PHP_EOL;
}

// quiz7


$num = 0;

if ($num == 0) {
  echo "It's zero!\n";
} else {
  echo "It's not zero...";
}

if ($num < 20) {
  echo "less than 20!\n";
} else if ($num < 40) {
  echo "at least 20 and less than 40!\n";
} else {
  echo "at least 40!\n";
}

if ($num >= 10) {
  echo "more than 10, then 1 subtracted from num...\n";
  $num--;
  echo $num . "\n";
}

 ?>
