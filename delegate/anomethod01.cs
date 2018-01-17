using System;

delegate int MyDelegate(string s);

class MyClass
{
  public int Show(string s)
  {
    Console.WriteLine("{0}と入力されました", s);
    return 0;
  }
}



class AnoMethod
{
  public static void Main()
  {
    MyClass mc = new MyClass();
    Console.WriteLine("文字入力 --- ");
    string x = Console.ReadLine();

    // 従来型
    MyDelegate mdg = new MyDelegate(mc.Show);
    mdg(x);

    // 匿名メソッド
    MyDelegate mdg2 = delegate(string i)
    {
      Console.WriteLine("{0}と入力されました", i);
      return 0;
    };
    mdg2(x);
  }
}
