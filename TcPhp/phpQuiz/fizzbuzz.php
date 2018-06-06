<?php

function fizz_buzz($num)
{
  if ($num % 15 == 0)
  {
      echo "fizz buzz", PHP_EOL;
  }
  else if ($num % 3 == 0)
  {
    echo "fizz", PHP_EOL;
  }
  else if($num % 5 == 0)
  {
    echo "buzz", PHP_EOL;
  }
  else
  {
    echo $num, PHP_EOL;
  }
}


$num = 0;

while ($num < 101)
{
  fizz_buzz($num);
  $num ++;
}

 ?>
