

var numbers = new[]{5,3,9,6,7,5,8,1,0,5,10,4};

// step1

var count = Count
(
  numbers,
  (int n) =>
  {
    if (n % 2 == 0)
    {
      return true;
    }
    else
    {
      return false;
    }
  }
);

// step2

var count2 = Count(numbers, (int n) => {return n % 2 == 0; });

// step 3

var count3 = Count(numbers, (int n ) => n % 2 == 0);

// step4

var count4 = Count(numbers, (n) => n % 2 == 0);

//step5

var count5 = Count(numbers, n => n % 2 == 0);




// 奇数をカウントする

var count6 = Count(numbers, n => n % 2 == 1);

// 5以上の数をカウントする

var count7 = Count(numbers, n => n >= 5);

// 5以上10未満の数をカウントする

var count8 = Count(numbers, n => 5 <= n && n < 10 );

// 数字の1が含まれている数をカウントする

var count9 = Count(numbers, n => n.ToString().Contains('1'));
