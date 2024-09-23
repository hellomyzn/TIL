using System;

struct MyStruct
{
  public int x;
}

class MyClass
{
  public int x;
}

class Struct04
{
  public static void Main()
  {
    MyStruct ms1 = new MyStruct();
    MyStruct ms2;

    ms1.x = 20;
    ms2 = ms1;
    Console.WriteLine("ms2.x = {0}", ms2.x);
    ms2.x = 10;
    Console.WriteLine("ms1.x = {0}", ms1.x);


    MyClass mc1 =  new MyClass();
    MyClass mc2;

    mc1.x = 20;
    mc2 = mc1;
    Console.WriteLine("mc2.x = {0}", mc2.x);
    mc2.x = 10;
    Console.WriteLine("mc1.x = {0}", mc1.x);
  }
}
