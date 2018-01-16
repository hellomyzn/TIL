using System;

class Fact
{
  public long CalcFact(int n)
  {
    long fact;

    if(n == 0)
    {
      fact = 1;
    }
    else
    {
      fact = n * CalcFact(n - 1); // 再帰呼び出し
    }
    return fact;
  }
}

class Fact01
{
  public static void Main()
  {
    Fact f = new Fact();
    for(int i = 0; i <= 20; i++)
    {
      Console.WriteLine("{0}! = {1}", i, f.CalcFact(i));
    }
  }
}
