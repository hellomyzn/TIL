using System;

class Continue01
{
  public static void Main()
  {
    int sum = 0;

    for(int i = 0; i < 100; i++)
    {
      // iを2で割ってあまりが0かどうか(偶数かどうか)
      if (i % 2 == 0)
      {
        sum += i;
      }
      else
      {
        // iが奇数の場合
        continue;

      }
      //iが奇数の場合、continueされるので次の行は実行されない
      Console.WriteLine("i = {0,2}, sum = {1,4}", i, sum);
    }
    Console.WriteLine("合計は{0}です", sum);
  }
}
