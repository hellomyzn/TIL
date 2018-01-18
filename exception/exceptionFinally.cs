using System;

class Exception05
{
  public static void Main()
  {
    string strWarusu;
    int x;
    bool bEnd = false;

    while(true)
    {
      Console.Write("割る数---");
      strWarusu = Console.ReadLine();

      try
      {
        x = int.Parse(strWarusu);
        Console.WriteLine("10 / {0} = {1}", x, 10 /x);
      }
      catch (DivideByZeroException d)
      {
        Console.WriteLine(d.Message);
      }
      catch (Exception e)
      {
        Console.WriteLine(e.Message);
      }
      finally
      {
        Console.Write("続けますか？(Y/N)---");
        if (Console.ReadLine()[0] == 'N')
        {
          bEnd = true;
        }
      }
      if(bEnd) break;
    }
  }
}
