using System;

delegate DateTime MyDelegate(DateTime td, int n);

class MyClass1
{
  public DateTime Calc(DateTime d, int n)
  {
    return d.AddDays(n);
  }
}

class MyClass2
{
  public DateTime Calc(DateTime d, int n)
  {
    return d.AddHours(n);
  }
}

class Delegeate
{
  public static void Main()
  {
    MyClass1 mc1 = new MyClass1();
    MyClass2 mc2 = new MyClass2();

    MyDelegate md = new MyDelegate(mc1.Calc);
    DateTime dt = DateTime.Now;

    DateTime myDate;

    myDate = md(dt, 100);
    Console.WriteLine("今日から100日後は{0}です", myDate.ToShortDateString());

    md = new MyDelegate(mc2.Calc);

    myDate = md(dt, 100);
    Console.WriteLine("今から100時間後は{0}です" ,myDate);
  }
}
