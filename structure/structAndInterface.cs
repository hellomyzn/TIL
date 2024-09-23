using System;

interface IMyInterface
{
  void Show();
  int xprop
  {
    get;
    set;
  }
}

struct MyStruct : IMyInterface
{
  int x;
  public void Show()
  {
    Console.WriteLine("x = {0}", x);
  }

  public int xprop
  {
    get
    {
      return x;
    }
    set
    {
      x = value;
    }
  }
}

class struct05
{
  public static void Main()
  {
    MyStruct msNew = new MyStruct();
    msNew.Show();
    msNew.xprop = 20;
    msNew.Show();
  }
}
