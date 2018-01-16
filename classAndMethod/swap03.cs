using System;

class MyClass
{
  private int temp;

  public void Swap(ref int x, ref int y)
  {
    temp = x;
    x = y;
    y = temp;
  }
}

class Swap01
{
  public static void Main()
  {
    MyClass s = new MyClass();
    int x = 10, y = 20;
    s.Swap(ref x, ref y);
    Console.WriteLine("x = {0}, y = {1}", x, y);
  }
}
