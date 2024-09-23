using System;
using System.Collections.Generic;
using System.Linq;

class DelayedExecution
{
  static void Main()
  {
    string[] names =
    {
      "Tokyo", "New Delhi", "Bangkok", "London", "Paris", "Berlin","Canbrra","Hong Kong"
    };

    var query = names.Where(s => s.Length < = 5);
    foreach (var item in query)
    {
      Console.WriteLine(item);
    }
    Console.WriteLine("---------------------------");

    names[0] = "Osaka";
    foreach (var item in query)
    {
      Console.WriteLine(item);
    }
  }
}
