using System;

interface IMyInterface
{
  int Calc(int x, int y);
}

class Plus : IMyInterface
{
  public int Calc(int a, int b)
  {
    return a + b;
  }
}

class Minus : IMyInterface
{
  public int Calc(int a, int b)
  {
    return a - b;
  }
}

class Interface
{
  public static void Main()
  {
    IMyInterface im;
    Plus p = new Plus();
    Minus m = new Minus();

    im = p;
    Console.WriteLine("im.Calc = {0}", im.Calc(3, 5));
    Console.WriteLine("im.Calc = {0}", p.Calc(3, 5));

    im = m;
    Console.WriteLine("im.Calc = {0}", im.Calc(3, 5));
    Console.WriteLine("im.Calc = {0}", m.Calc(3, 5));
  }
}
