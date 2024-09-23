using System;

class MyEx : DivideByZeroException
{
  public new string Message = "0で割るエラーです";
  public new string HelpLink = "http://www.kumei.ne.jp/c_lang/";

  public override string ToString()
  {
    return "0で割ってはいけません!!";
  }
}

class Exception09
{
  public static void Main()
  {
    int x;

    Console.Write("割る数(整数) --- ");
    string strWaru = Console.ReadLine();
    try
    {
      x = int.Parse(strWaru);
      if(x == 0)
      {
        throw new MyEx();
      }
      Console.WriteLine("12 / {0} = {1}", x, 12 / x);
    }
    catch(MyEx me)
    {
      Console.WriteLine(me.ToString());
      Console.WriteLine(me.Message);
      Console.WriteLine(me.HelpLink + "を参照");
    }
    catch (Exception e)
    {
      Console.WriteLine(e.Message);
    }
  }
}
