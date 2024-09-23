using System;

class Sort01
{
  public static void Main()
  {
    string[] name = new string[5]
    {
      "Eric", "Peter","Frank", "Kate", "Thomas"
    };

    for (int i = 0; i < name.Length; i++)
    {
      Console.WriteLine(name[i]);
    }
    Console.WriteLine();

    Array.Sort(name);
    for (int i = 0; i < name.Length; i++)
    {
      Console.WriteLine(name[i]);
    }
    Console.WriteLine();

    Array.Reverse(name);
    for (int i = 0; i < name.Length; i++)
    {
      Console.WriteLine(name[i]);
    }
  }
}
