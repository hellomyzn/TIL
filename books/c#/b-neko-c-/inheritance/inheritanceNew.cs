using System;

class Base
{
  public int x = 10;
  protected void BaseMethod()
  {
    Console.WriteLine("Baseクラスです");
  }
}

class Derived : Base
{
  new public int x = 20;
  new public void BaseMethod()
  {
    Console.WriteLine("Derivedクラスです");
  }
}

class Hogehoge : Base
{
  new private int  x = 30;
  new public void BaseMethod()
  {
    Console.WriteLine("hogehogeクラスです");
  }

  public void Show()
  {
    Console.WriteLine("base.x = {0}, x = {1}", base.x, x);
  }
}

class InheritanceNew
{
  public static void Main()
  {
    Derived d = new Derived();
    Console.WriteLine("x = {0}", d.x);
    d.BaseMethod();

    Hogehoge h = new Hogehoge();
    Console.WriteLine("x = {0}", h.x);
    h.BaseMethod();
    h.Show();
  }
}
