using System;

class MyClassA
{
  public void Calc()
  {
    int x = 10, y = 0;
    int[] arr = new int[5]{1,2,3,4,5};
    try
    {
      Console.WriteLine("{0}, {1}", arr[x], x/y);
    }
    catch (IndexOutOfRangeException i)
    {
      Console.WriteLine(i.Message);
      DivideByZeroException d = new DivideByZeroException();
      Console.WriteLine("外側にthrowします");
      throw d;
    }
  }
}


class MyClassB
{
  public void Calc()
  {
    MyClassA a = new MyClassA();
    try
    {
      a.Calc();
    }
    catch(DivideByZeroException d)
    {
      Console.WriteLine("外側のcatchブロックです");
      Console.WriteLine(d.Message);
    }
  }
}

class Exception06
{
  public static void Main()
  {
    MyClassB b = new MyClassB();
    b.Calc();
  }
}
