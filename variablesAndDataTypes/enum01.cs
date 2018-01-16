using System;

class Enum01
{
  enum MyMonth
  {
    Jan = 1, Feb, Mar, Apr, May, Jun,
    Jul, Aug, Sep, Oct, Nov, Dec
  };

  public static void Main()
  {
    Console.WriteLine("Aprは{0}月", (int)MyMonth.Apr);
    Console.WriteLine("Mayは{0}月", (int)MyMonth.May);
  }
}
