using System;

class DestructTest
{

  int x;

  // デストラクト
  ~DestructTest()
  {
    Console.WriteLine("デストラクトが呼ばれました");
    Console.WriteLine("xは{0}", x);
  }

  // 引数付きコンストラクト
  public DestructTest(int n)
  {
    Console.WriteLine("コンストラクトが呼ばれました");
    x = n;
    Console.WriteLine("xに{0}を代入しました",n);
  }
}

class Destruct
{
  public static void Main()
  {
    DestructTest dt1 = new DestructTest(1);
    Console.WriteLine("dt1生成");
    DestructTest dt2 = new DestructTest(2);
    Console.WriteLine("dt2生成");
    DestructTest dt3 = new DestructTest(3);
    Console.WriteLine("dt3生成");
  }
}
