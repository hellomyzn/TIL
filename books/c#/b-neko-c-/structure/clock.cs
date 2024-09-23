using System;

class Clock
{
  public static void Main()
  {
    int oldSecond = 0;
    Console.CursorVisible = false;
    Console.Title = "時計";
    Console.SetWindowSize(12, 3);
    Console.BackgroundColor = ConsoleColor.Yellow;
    Console.ForegroundColor = ConsoleColor.Black;
    Console.Clear();

    while (true)
    {
      DateTime mt = DateTime.Now;
      if(mt.Second == oldSecond)
      {
        continue;
      }
      else
      {
        oldSecond = mt.Second;
      }
      Console.SetCursorPosition(2, 1);
      Console.Write("{0:00} : {1:00}: {2:00}", mt.Hour, mt.Minute, mt.Second);
      if (Console.KeyAvailable) break;
    }
  }
}
