using System;
using System.Collections.Generic;

class Initialize
{
  static void Main()
  {

    // 配列の初期化
    var langs = new string[]{"c#","VB","C++"};
    var nums = new List<int>{10,20,30,40,50};

    // 辞書の初期化
    var dict = new Dictionary<string, string>
    {
      ["ja"] = "日本語",
      ["en"] = "英語",
      ["es"] = "スペイン語",
      ["de"] = "ドイツ語",
    };

    // オブジェクトの初期化
    var person = new Person
    {
        Name = "新井春菜",
        Birthday = new DateTime(1995, 11, 23),
        PhotoNumber = "012-3456-7890"

    };

    var line = Console.ReadLine();
    int num = int.Parse(line);
    if (num > 80)
    {
      Console.WriteLine("hoge");
    }
    else if(num > 60)
    {
      Console.WriteLine("hoge2");
    }
    else
    {
      if (num > 40)
      {
        Console.WriteLine("hoge3");
      }
      else
      {
        Console.WriteLine("hoge4");
      }
    }

    int hogeInt = 0;

    int? nullInt = null;

    nullInt++;
    Console.WriteLine(nullInt);

    nullInt = 3;
    hogeInt = (int)nullInt;

    Console.WriteLine(hogeInt);
  }
}

class Person
{
  public string Name {get; set;}
  public DateTime Birthday {get; set;}
  public string PhotoNumber {get; set;}
}
