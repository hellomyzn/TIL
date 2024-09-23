using System;

abstract class MyAb
{
  public abstract double Hanbetsu(double a, double b, double c);

}

class MyHanbetsu : MyAb
{
  public override double Hanbetsu(double a, double b, double c)
  {
    return Math.Pow(b, 2.0) - 4.0 * a * c;
  }
}

class Abstract
{
  public static void Main()
  {
    MyHanbetsu h = new MyHanbetsu();
    double d = h.Hanbetsu(1.0, 2.0, 3.0);
    Console.WriteLine(d);
  }
}
