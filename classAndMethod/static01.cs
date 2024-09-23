using System;

static class MyClass
{

  public static int x;
  public static void ShowX()
  {
    Console.WriteLine("x = {0}", x);
  }
}

class Static01
{
  public static void Main()
  {
    MyClass.x = 10;
    MyClass.ShowX();
  }
}
