using System;

class Mammal
{
  protected const int legNo = 4;
  protected string tail, gei, food, koe;

  public virtual string this[string index]
  {
    get
    {
      return "::::::";
    }
  }
  public int Leg()
  {
    return legNo;
  }
}

class Cat : Mammal
{
  public override string this[string index]
  {
    get
    {
      switch(index)
      {
        case "尾":
          tail = "1本";
          return tail;

        case "芸":
          gei = "できない";
          return gei;
        case "鳴き声":
          koe = "ニャーニャー";
          return koe;
        case "食べ物":
          food = "キャットフード";
          return food;

        default:
          return "";
      }
    }
  }
}


class Dog : Mammal
{
  public override string this[string index]
  {
    get
    {
      switch(index)
      {
        case "尾":
          tail = "1本";
          return tail;
        case "芸":
          gei = "できる";
          return gei;
        case "鳴き声":
          koe = "わんわん";
          return koe;
        case "食べ物":
          food = "ドックフード";
          return food;
        default:
          return "";
      }
    }
  }
}


class Override
{
  public static void Main()
  {
    Mammal m;
    Cat cat = new Cat();
    Dog dog = new Dog();

    m = cat;
    Console.WriteLine("猫の足は{0}本です尻尾は{1}、芸は{2}。食べ物は{3}。", m.Leg(), m["尾"], m["芸"], m["食べ物"]);

    m = dog;
    Console.WriteLine("犬の足は{0}本です尻尾は{1}、芸は{2}。食べ物は{3}。", m.Leg(), m["尾"], m["芸"], m["食べ物"]);

  }
}
