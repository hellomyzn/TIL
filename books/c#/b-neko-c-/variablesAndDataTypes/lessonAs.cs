using System;

class LessonAs
{
  public static void Main()
  {
    long l = 100;
    object o;
    string s;

    o = l;
    s = o as string;
    Console.WriteLine(o);
  }
}
