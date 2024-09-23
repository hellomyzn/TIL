using System;

class MyClass
{
  private string name;
  private int age;
  private string address;

  public void Show()
  {
    string toshi;
    if(age == -1)
    {
      toshi="不明";
    }
    else
    {
      toshi = age.ToString();
    }
    Console.WriteLine("氏名:{0} 住所:{1} 年齢:{2} ", name, address, toshi);
  }

  public MyClass(string str)
  {
    name = str;
    address = "不定";
    age = -1;
  }

  public MyClass(int x)
  {
    age = x;
    name = "不明";
    address = "不定";
  }

  public MyClass(string str1, string str2, int x)
  {
    name = str1;
    address = str2;
    age = x;
  }
}

class Construct01
{
  public static void Main()
  {
    MyClass mc1 = new MyClass(18);
    MyClass mc2 = new MyClass("miyazono eiji");
    MyClass mc3 = new MyClass("sasaoka", "Tokyo", 24);

    mc1.Show();
    mc2.Show();
    mc3.Show();
  }
}
