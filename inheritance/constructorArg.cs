using System;

class MyBase
{
  protected double d;
  public MyBase(double a, double b, double c)
  {
    d = Math.Pow(b, 2.0) - 4.0 * a * c;
  }
}

class MyJudge : MyBase
{
  public bool bJudge;

  public MyJudge(double p, double q, double r) : base(p, q, r)
  {
    Console.WriteLine("判別式 = {0}", d);
    if (d < 0.0)
      bJudge = false;
    else
      bJudge = true;
  }
}

class InheritanceNew
{
  public static void Main()
  {
    MyJudge mj = new MyJudge(1,2,3);
    Console.WriteLine(mj.bJudge);
    MyJudge mk = new MyJudge(1,4,0);
    Console.WriteLine(mk.bJudge);
  }
}
