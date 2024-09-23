using System;

class Test
{
  static int x;

  public static int myProp
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

class staticProp
{
  public static void Main()
  {
    Test.myProp = 10;
    Console.WriteLine("Test.myProp = {0}", Test.myProp);
  }
}
