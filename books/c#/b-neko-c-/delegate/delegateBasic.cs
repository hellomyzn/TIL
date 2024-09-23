using System;

delegate void MyDelegate();
delegate string MyDelegate2(string a, string b);

class MyClass
{
  public void Show()
  {
    Console.WriteLine("呼ばれました");
  }

  public static string ShowShow(string s1, string s2)
  {
    return s1 + "は" + s2 + "です";
  }

}

class Delegate
{
  public static void Main()
  {
    MyClass mc = new MyClass();
    mc.Show();

    MyDelegate m = new MyDelegate(mc.Show);
    m();

    MyDelegate2 md = new MyDelegate2(MyClass.ShowShow);
    Console.WriteLine(md("C", "おもしろい"));
  }

}
