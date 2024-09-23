using System;

struct MyStruct
{
  public static int x = 10;
  // public int y = 10;
  static int[] myArray = new int[10];

  public static void Show()
  {
    Console.WriteLine("x = {0}", x);
  }
}

struct YourStruct
{
  public int y;
  public void Show()
  {
    Console.WriteLine("y = {0}", y);
  }
}

class Struct02
{
  public static void Main()
  {
    MyStruct.Show();
    MyStruct.x = 20;
    MyStruct.Show();

    YourStruct ys;
    ys.y = 10;
    ys.Show();
  }
}
