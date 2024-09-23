using System;

class Type02
{
  public static void Main()
  {
      Console.Write("整数を入力してください");
      int x = int.Parse(Console.ReadLine());
      Console.WriteLine("今の数字を2倍すると{0}ですね", x * 2);

      Console.Write("あなたの年齢を入力して下さい");
      ushort age = ushort.Parse(Console.ReadLine());
      Console.WriteLine("ato{0}年で100歳ですね", 100 - age);
  }
}
