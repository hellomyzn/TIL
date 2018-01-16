using System;

class Foreach01
{
  public static void Main()
  {
    string[] animal = new string[]{"犬","猫","雉","猿"};
    int[] num = new int[]{10,20,30,40};

    foreach(string str in animal)
    {
      Console.WriteLine(str);
    }

    Console.WriteLine();
    foreach(int i in num)
    {
      Console.WriteLine(i);
    }

  }
}
