using System;

class MyClass
{
  string[] name = new string[5];

  public string this[int i]
  {
    get
    {
      return name[i];
    }
    set
    {
      name[i] = value;
    }
  }
}

class Indexer
{
  public static void Main()
  {
    MyClass mc = new MyClass();

    mc[0] = "hoge";
    mc[1] = "fuga";
    mc[2] = "piyo";

    for (int i = 0; i < 5; i++)
    {
      Console.WriteLine(mc[i]);
    }

  }
}
