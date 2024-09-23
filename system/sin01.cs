using System;

class Sin01
{
  public static void Main()
  {
    double s;

    for (double a = 0.0; a <= Math.PI; a += Math.PI / 45.0)
    {
      s = Math.Sin(a);
      Console.WriteLine("{0,7:#.#####}:",s);
      for(int i = 1; i <= Math.Round(s * 50); i++)
      {
        Console.Write("*");
      }

      Console.WriteLine();
      Console.WriteLine(Math.PI/45.0);
    }
  }
}
