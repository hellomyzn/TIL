using System;

class MyIndexer
{
  int[] array;
  int nMax;

  public int this[int n]
  {
    get
    {
      if (n < nMax)
      {
        return array[n];
      }
      else
      {
        return 0;
      }
    }
    set
    {
      if (n < nMax)
      {
        array[n] = value;
      }
    }
  }

  public MyIndexer(int i)
  {
    array = new int[i];
    nMax = i;
  }
}

class Indexer02
{
  public static void Main()
  {
    MyIndexer mi = new MyIndexer(20);
    for (int i = 0; i < 20; i++)
    {
      mi[i] = i * i;
    }

    for (int i = 0; i < 20; i++)
    {
      Console.WriteLine("{0} * {0} = {1}", i, mi[i]);
    }

    mi[30] = 30;
    Console.WriteLine("mi[30] = {0}", mi[30]);
  }
}
