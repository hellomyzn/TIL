using System;

class Switch01
{
  public static void Main()
  {
    Console.WriteLine("************* Menu ************");
    Console.WriteLine("1:ファイル");
    Console.WriteLine("2:編集");
    Console.WriteLine("3:表示");
    Console.WriteLine("0:終了");
    Console.WriteLine("*******************************");

    Console.WriteLine("\n選択---");

    string strAns = Console.ReadLine();

    switch (strAns)
    {
      case "1":
        Console.WriteLine("ファイルが選択されました");
        break;
      case "2":
        Console.WriteLine("編集が選択されました");
        break;
      case "3":
        Console.WriteLine("表示が選択されました");
        break;
      case "0":
        Console.WriteLine("終了が選択されました");
        break;
      default:
        Console.WriteLine("入力ミスです");
        break;
    }


  }
}
