using System;
using System.Collections.Generic;

class HogeSystem
{
  static void Main()
  {
    var list = new List<string>{"key"};
    var num = list.Contains("key") ? 1 : 0;

    Console.WriteLine(num);

    var piyopiyo = new FugaSystem();
    var message = piyopiyo.GetMessage("hoge") ?? piyopiyo.DefaultMessage();
    Console.WriteLine(message);


    var sale = new FugaSystem
    {
      Product = "gkskdngsdlk",
    };
    // return sale?.Product;
    Console.WriteLine(sale.Product);

    sale.Median(2,3,4,5,6,7,5);

    sale.DoSomething(100);
    sale.DoSomething(100, "エラーです");
    sale.DoSomething(100, "エラーです", 5);
    sale.DoSomething(100, "エラーです", 5);


  }

}

class FugaSystem
{
  public string Product{get; set;}

  public string GetMessage(string hoge)
  {
    string piyo = hoge;
    return null;
  }

  public string DefaultMessage()
  {
    return "fuga";
  }

  public int[] Median(params int[] args)
  {
    Console.WriteLine(args);
    return args;
  }

  public void DoSomething(int num, string message = "失敗しました", int retryCount = 3)
  {
    Console.WriteLine(num + message + retryCount);
    return;
  }
}
