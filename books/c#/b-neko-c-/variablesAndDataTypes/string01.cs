using System;

class String01
{

  public static void Main()
  {

    string str = "今日は良い天気です";
    string myStr;
    char c;

    // Lengthプロパティで文字列の長さを調べる
    Console.WriteLine("strは長さ{0}です", str.Length);

    // 文字列変数cに文字列strの5番目の文字を代入
    c = str[4];
    Console.WriteLine("文字列の5番目の文字は{0}です", c);

    // 文字列strをmyStrにコピー
    myStr = String.Copy(str);
    Console.WriteLine("myStr = {0}", myStr);

    // 文字列の検索
    int n = str.IndexOf("は");
    Console.WriteLine("文字列に'は'が出てくるのは{0}番目の文字", n+1);

    // n = str.IndexOf('よい');
    Console.WriteLine("文字列に[よい]が手でくるのは{0}文字目から", n+1);

  }

}
