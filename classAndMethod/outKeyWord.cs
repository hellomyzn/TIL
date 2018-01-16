using System;

class MyClass
{
  public void Square(double x, double y, out double s)
  {
    s = x * y;
  }
}

class OutKeyword01
{
  public static void Main()
  {
    double a = 125.3, b = 16.25, c;
    MyClass mc = new MyClass();

    mc.Square(a, b, out c);

    Console.WriteLine("縦{0}m, 横{1}mの長方形の面積は{2}平方メートル", a, b, c);
  }
}
