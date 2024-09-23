using System;

class Exceptino03
{
  public static void Main()
  {
    int[] arr = new int[5];

    try
    {
      arr[5] = 10; // 配列の教会をわざと超える
    }
    catch (IndexOutOfRangeException io)
    {
      Console.WriteLine(io);
      Console.WriteLine("[io]------------------");
      Console.WriteLine(io.Source);
      Console.WriteLine("[io.Source]--------------");
      Console.WriteLine(io.Message);
      Console.WriteLine("[io.Message]--------------");
      Console.WriteLine(io.ToString());
      Console.WriteLine("[io.ToString()]-----------------");
      Console.WriteLine(io.TargetSite);
      Console.WriteLine("[io.TargetSite]----------------");
    }
  }
}
