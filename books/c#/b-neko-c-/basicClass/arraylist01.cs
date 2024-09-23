using System;
using System.Collections;

class ArrayList01
{
  public static void Main()
  {
    bool bEnd = false;
    string strData;
    double sum = 0.0;
    ArrayList al = new ArrayList();

    while(true)
    {
      Console.Write("データ(数値以外入力で終了)--");
      strData = Console.ReadLine();
      if (!Char.IsDigit(strData[0]) && strData[0] != '-')
      {
        bEnd = true;
      }
      else
      {
        al.Add(double.Parse(strData));
      }
      if(bEnd)
      {
        break;
      }
    }

    for (int i = 0; i < al.Count; i++)
    {
      Console.WriteLine("Data[{0}] = {1}", i + 1, al[i]);
      sum += (double)al[i];
    }

    int count = al.Count;
    double avr = sum / count;
    Console.WriteLine("データ個数 = {0}", count);
    Console.WriteLine("平均値 = {0}", avr);
  }
}
