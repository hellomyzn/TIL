using System;
using System.Linq;
using System.Collections.Generic;

class Linq
{
  public static void Main()
  {
    string[] myStr = {"flower", "cat", "dog", "bird", "rabbit"};

    // クエリの作成
    IEnumerable<string> q =
      from s in myStr
      where s.Length >= 4
      orderby s descending
      select s;

    // クエリの実行
    foreach(string x in q)
    {
      Console.WriteLine(x);
    }

    // 検索条件に適合した要素の個数
    Console.WriteLine("適合した数={0}", q.Count());
  }
}
