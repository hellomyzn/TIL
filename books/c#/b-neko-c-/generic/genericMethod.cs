using System;

class MyClass
{
  static object obj;
  object ob;

  public static void MySet<T>(T x)
  {
    obj = (T)x;
  }

  public static void Show()
  {
    Console.WriteLine(obj.ToString());
  }

  public void MySet2<T>(T x)
  {
    ob = (T)x;
  }

  public void Show2()
  {
    Console.WriteLine(ob.ToString());
  }
}

class generic07
{
  public static void Main()
  {
    MyClass.MySet<int>(12);
    MyClass.Show();

    MyClass.MySet<string>("abc");
    MyClass.Show();

    MyClass mc2 = new MyClass();
    mc2.MySet2<int>(100);
    mc2.Show2();
  }
}
