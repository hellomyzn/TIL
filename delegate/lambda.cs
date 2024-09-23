using System;

delegate int MyDelegate(int x, int y);
delegate void MyDelegate2(int x);

class Lambda
{
  public static void Main()
  {
    MyDelegate md = (x, y) => {return x + y;};
    Console.WriteLine("2 + 3 = {0}", md(2, 3));

    MyDelegate2 md1 = x => Console.WriteLine("{0}の2乗は{1}", x, x * x);
    MyDelegate2 md2 = x => Console.WriteLine("{0}の2倍は{1}", x, x * 2);

    MyDelegate2 md3 = md1 + md2;
    md3(10);
  }
}
