using System;

class MyBase
{
  protected int x;

  public MyBase()
  {
    Console.WriteLine("ここはMyBase");
    x = 10;
  }
}

class Derived1 : MyBase
{
  public Derived1()
  {
    Console.WriteLine("ここはDerived1");
    x = 20;
  }
}

class Derived2 : Derived1
{
  public Derived2()
  {
    Console.WriteLine("ここはDerived2");
    x = 30;
  }
  public void Show()
  {
    Console.WriteLine("x = {0}", x);
  }
}

class InheritanceNew
{
  public static void Main()
  {
    Derived2 d2 = new Derived2();
    d2.Show();
  }
}
