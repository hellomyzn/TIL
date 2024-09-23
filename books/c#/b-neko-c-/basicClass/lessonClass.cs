using System;

class lessonClass
{
  private int total = 0;

  public void Nyukin(int en)
  {
    total += en;
    Console.WriteLine("{0}円を入金しました",en);
    return;
  }

  public void Shishutsu(int en)
  {
    if(total < en)
    {
      Console.WriteLine("{0}円も支出できません",en);
      return;
    }
    else
    {
      total -= en;
      Console.WriteLine("{0}円を支出しました",en);
      return;
    }
  }

  public void GetTotal()
  {
    if(total == 0)
    {
      Console.WriteLine("残高はありません");
      return;
    }
    else
    {
      Console.WriteLine("残高は{0}円です",total);
      return;
    }
  }
}

class NorReturnValue
{
  public static void Main()
  {
    lessonClass k = new lessonClass();

    k.GetTotal();
    k.Nyukin(10000);
    k.GetTotal();
    k.Nyukin(20000);
    k.GetTotal();
    k.Shishutsu(5000);
    k.GetTotal();
    k.Shishutsu(10000);
    k.GetTotal();
  }
}
