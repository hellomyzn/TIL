using System;
class MyOverload
{
  int[] a = new int[3]{1, 2, 3};
  int[,] b = new int[2,2]{{100, 200}, {300, 400}};

  public int this[int i]
  {
    get
    {
      return a[i];
    }
  }

  public int this[int i, int j]
  {
    get
    {
      return b[i, j];
    }
  }
}

class Indexer
{
  public static void Main()
  {
    MyOverload mo = new MyOverload();

    for (int i = 0; i < 3; i++)
    {
      Console.WriteLine("mo[{0}] = {1}", i, mo[i]);
    }

    for (int i = 0; i < 2; i++)
      for (int j = 0; j < 2; j++)
      {
        {
          Console.WriteLine("mo[{0}, {1}] = {2}", i, j, mo[i, j]);
        }
      }
  }
}
