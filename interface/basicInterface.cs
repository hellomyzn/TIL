using System;

interface IMyInterface
{
  void Show(string str);
  int xprop
  {
    get;
    set;
  }

  int this[int i]
  {
    get;
    set;
  }
}

class MyClass : IMyInterface
{
  protected int i;
  int[] arr = new int[10];

  public void Show(string str)
  {
    Console.WriteLine(str);
  }

  public int xprop
  {
    get
    {
      return i;
    }
    set
    {
      i = value;
    }
  }

  public int this[int index]
  {
    get
    {
      return arr[index];
    }
    set
    {
      arr[index] = value;
    }
  }
}

class Interface
{
  public static void Main()
  {
    MyClass mc = new MyClass();
    mc.Show("Test Interface");
    mc.xprop = 100;
    Console.WriteLine("mc.xprop = {0}", mc.xprop);
    for (int i = 0; i < 10; i++)
    {
      mc[i] = i * 2;
    }
    for (int i = 0; i < 10; i++)
    {
      Console.WriteLine("mc[{0}] = {1}", i, mc[i]);
    }
  }
}
