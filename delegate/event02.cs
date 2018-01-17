using System;

delegate void Handler(char ch);

class MyEventClass
{
  public event Handler KeyHit;

  public void OnKeyHit(char ch)
  {
    if (KeyHit != null)
    {
      KeyHit(ch);
    }
  }
}


class Show1
{
  int sum = 0;

  public void KeyShow(char ch)
  {
    if(Char.IsDigit(ch))
    {
      int a = (int)char.GetNumericValue(ch);
      sum += a;
      Console.WriteLine("+ {0}", a);
      Console.WriteLine("= {0}", sum);
    }
    else if (ch == 'c')
    {
      sum = 0;
      Console.WriteLine("合計がクリアされました");
    }
    else return;
  }
}

class Event02
{
  public static void Main()
  {
    ConsoleKeyInfo cki;

    MyEventClass ec = new MyEventClass();
    Show1 s = new Show1();

    ec.KeyHit += new Handler(s.KeyShow);

    while(true)
    {
      if (Console.KeyAvailable)
      {
        cki = Console.ReadKey(true);
        if(cki.KeyChar == 'x')
        {
          break;
        }
        else
        {
          ec.OnKeyHit(cki.KeyChar);
        }
      }
    }
  }
}
