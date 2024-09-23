using System;

class Mamma1
{
  protected const int legNo = 4;
  protected string koe;

  public virtual string Nakigoe()
  {
    koe = "::::::";
    return koe;
  }
  public int Leg()
  {
    return legNo;
  }
}

class Cat : Mamma1
{
  public override string Nakigoe()
  {
    koe = "ニャーニャー";
    return koe;
  }
}

class Dog : Mamma1
{
  public override string Nakigoe()
  {
    koe = "わんわん";
    return koe;
  }
}

class Override02
{
  public static void Main()
  {
    Mamma1 m;
    Cat cat = new Cat();
    Dog dog = new Dog();

    m = cat;
    Console.WriteLine("猫の足は{0}本で鳴き声は[{1}]です", m.Leg(), m.Nakigoe());

    m = dog;
    Console.WriteLine("犬の足は{0}本で鳴き声は[{1}]です", m.Leg(), m.Nakigoe());
  }
}
