using System;

class Base
{
  protected int x = 20;
}

class Derived : Base
{
  int y = 10;
  public void ShowXY()
  {
    Console.WriteLine("x = {0}, y = {1}", x, y);
  }
}

class Inheritance
{
  public static void Main()
  {
    Derived md = new Derived();
    md.ShowXY();
  }
}
