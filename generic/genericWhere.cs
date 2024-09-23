using System;

class MyClass
{
  public int x;
  public string name;
  public MyClass()
  {
    x = 0;
    name = "";
  }
}

class MyClass2<T> where T : MyClass, new()
{
  T p = new T();
  public void Show()
  {
    Console.WriteLine("x = {0}, p.name = {1}", p.x, p.name);
  }

  public void SetXName(int n, string str)
  {
    p.x = n;
    p.name = str;
  }
}

class generic06
{
  public static void Main()
  {
    MyClass2<MyClass> mc2 = new MyClass2<MyClass>();
    mc2.SetXName(100, "abc");
    mc2.Show();
  }
}
