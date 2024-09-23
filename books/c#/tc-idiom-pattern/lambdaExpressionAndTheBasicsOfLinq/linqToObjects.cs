using System;
using System.Collections.Generic;
using System.Linq;

class linqToObjects
{
  static void Main()
  {
    var list = new List<string>
    {
      "Tokyo", "New Delhi", "Bangkok", "London", "Paris", "Berlin","Canbrra","Hong Kong"
    };

    IEnumerable<string> query = list.Where(s => s.Length <= 5)
                                    .Select(s => s.ToLower());
    foreach (string s in query)
    {
      Console.WriteLine(s);
    }
  }
}
