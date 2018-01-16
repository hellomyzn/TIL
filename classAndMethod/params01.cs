using System;

class MyClass
{
  public void Show(params string[] animal)
  {
    if(animal.Length == 0)
    {
      return;
    }
    for (int i = 0; i < animal.Length; i++)
    {
      Console.WriteLine("{0}さんがいます", animal[i]);
    }
  }
}

class Params01
{
  public static void Main()
  {
    MyClass  mc = new MyClass();
    mc.Show();
    mc.Show("きりん", "ぞう", "かば");
  }
}
