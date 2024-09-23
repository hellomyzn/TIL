using System;
using System.Collections.Generic;

class ClassAndLambda
{
  static void Main()
  {
    var list = new List<string>
    {
      "Tokyo", "New Delhi", "Bangkok", "London", "Paris", "Berlin","Canbrra","Hong Kong"
    };

    var exists = list.Exists(s => s[0] == 'A');
    Console.WriteLine(exists);

    var name = list.Find(s => s.Length == 6);
    Console.WriteLine(name);

    int index = list.FindIndex(s => s == "Berlin");
    Console.WriteLine(index);

    var names = list.FindAll(s => s.Length <= 5);
    foreach (var s in names)
    {
      Console.WriteLine(s);
    }

    var removedCount = list.RemoveAll(s => s.Contains("on"));
    Console.WriteLine(removedCount);

    list.ForEach(Console.WriteLine);

    var lowerList = list.ConvertAll(s => s.ToLower());
    lowerList.ForEach(s => Console.WriteLine(s));
  }
}
