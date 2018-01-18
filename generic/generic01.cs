using System;

class MyClass<T>
{
  public T name;
  public T GetVal()
  {
    return name;
  }
}

class MyClass2<T,U>
{
  public T[] x;
  public U[] y;

  public MyClass2(int n)
  {
    x = new T[n];
    y = new U[n];

  }
}


class Generic01
{
  public static void Main()
  {
    MyClass<int> mca = new MyClass<int>();
    mca.name = 10;
    Console.WriteLine(mca.GetVal());

    MyClass<string> mcb = new MyClass<string>();
    mcb.name = "猫";
    Console.WriteLine(mcb.GetVal());


    int n;
    Console.WriteLine("n = ");
    string strN = Console.ReadLine();
    if (!Char.IsDigit(strN[0]))
    {
      Console.WriteLine("入力が不適切です");
      return;
    }

    n = int.Parse(strN);
    MyClass2<int, string> mc = new MyClass2<int, string>(n);

    for (int i = 0; i < n; i++)
    {
      Console.Write("番号---");
      string strNo = Console.ReadLine();
      if (!Char.IsDigit(strNo[0]))
      {
        Console.WriteLine("入力が不適切です");
        break;
      }
      mc.x[i] = int.Parse(strNo);

      Console.Write("氏名---");
      string strName = Console.ReadLine();
      mc.y[i] = strName;
    }

    Console.WriteLine();
    for(int i = 0; i < n; i++)
    {
      Console.WriteLine("[{0}] {1}", mc.x[i], mc.y[i]);
    }
  }
}
