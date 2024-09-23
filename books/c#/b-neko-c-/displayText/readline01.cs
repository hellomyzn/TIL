using System;

class ReadLine01
{
  public static void Main()
  {
    string name;;
    Console.Write("あなたの名前はなんですか？");
    name = Console.ReadLine();
    Console.WriteLine("あなたのお名前は{0}さんです",name);
  }
}
