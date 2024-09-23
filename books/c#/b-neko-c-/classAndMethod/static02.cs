using System;

class Cat
{
  static int numOfTail;
  string name;

  public void SetName(string strName)
  {
    name = strName;
  }

  public void ShowCat()
  {
    if(name == null)
    {
      Console.WriteLine("名前が設定されていません");
      return;
    }
    Console.WriteLine("猫の名前は{0}で尾の数は{1}本です", name, numOfTail);
  }

  public  static void SetCatTail(int num)
  {
    //　ここではインスタンス変数にアクセスできない
    numOfTail = num;
  }
}

class Static02
{
  public static void Main()
  {
    Cat.SetCatTail(1);

    Cat myCat = new Cat();
    Cat yourCat = new Cat();

    myCat.ShowCat();

    myCat.SetName("マイケル");
    yourCat.SetName("パトリシア");

    myCat.ShowCat();
    yourCat.ShowCat();
  }
}
