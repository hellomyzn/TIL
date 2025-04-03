<?php

  // echo "何かを入力してください。";
  //
  // $input = trim(fgets(STDIN));
  //
  // echo "{$input}!";
  //
  // function puts_something($something) {
  //   echo $something . "!\n";
  // }
  //
  // echo "何か値を入力してください・・・\n";
  // $string = trim(fgets(STDIN));
  // puts_something($string);



  //
  // function multiplication($num1, $num2) {
  //   echo "{$num1}と{$num2}をかけた答えは" . $num1 * $num2 . "です！\n";
  // }
  //
  // echo "最初の数字を入力してください\n";
  // $num1 = trim(fgets(STDIN));
  // echo "2番目の数字を入力してください\n";
  // $num2 = trim(fgets(STDIN));
  //
  // multiplication($num1, $num2);


  //
  // function fruits_box($fruits, $num)
  // {
  //   echo "{num}番目の要素は{$fruits[$num -1]}です。\n";
  // }
  //
  // $fruits_box = array("apple", "orange", "cherry");
  //
  // echo "何がでるかな？取り出したい要素の番号を入力してください\n";
  //
  // $num = trim(fgets(STDIN));
  // fruits_box($fruits_box, $num);





  function movie_info($movie, $data) {
  echo $movie[$data] . "\n";
  }

  $movie = array("title" => "ハリーポッター", "genre" => "ファンタジー", "year" => "2001年");

  echo "\"以下から一つ選んで入力してください。\n・title\n・genre\n・year\n";

  $info = trim(fgets(STDIN));
  movie_info($movie, $info);


 ?>
