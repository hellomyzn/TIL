using System;

class Kiteral01
{
  public static void Main()
  {
    string format = "{0}の方は.NET型で{1}です";

    Console.WriteLine(format, "100", 100.GetType());
    Console.WriteLine(format, "100U", 100U.GetType());
    Console.WriteLine(format, "100L", 100L.GetType());
    Console.WriteLine(format, "100UL", 100UL.GetType());
    Console.WriteLine(format, "1.25", 1.25.GetType());
    Console.WriteLine(format, "1.25F", 1.25F.GetType());
    Console.WriteLine(format, "1.25M", 1.25M.GetType());

    Console.WriteLine();

    Console.WriteLine(format, "10F", 10F.GetType());
    Console.WriteLine(format, "10D", 10D.GetType());
    Console.WriteLine(format, "10M", 10M.GetType());

    Console.WriteLine();

    Console.WriteLine(format, "-10D", (-10D).GetType());    
  }
}
