using System;

class Change
{
  public void Modify(int[] array)
  {
    int n = array.Length;
    for (int i = 0; i < n; i++)
    {
      array[i] *= 2;
    }
  }

  public void Modify(ref int i)
  {
    i *= 2;
  }
}

class ChangeArrayInt
{
  public static void Main()
  {
    Change c = new Change();

    int[] myArray = new int[3]{1,2,3};
    int hogehoge = 10;

    Console.WriteLine("----Modifyメソッド実行前----");
    int i = 0;
    foreach (int x in myArray)
    {
      Console.WriteLine("myArray[{0}] = {1}", i, x);
      i++;
    }
    Console.WriteLine(hogehoge);


    c.Modify(ref hogehoge);
    c.Modify(myArray);

    Console.WriteLine("----Modifyメソッド実行前----");
    i = 0;
    foreach(int x in myArray)
    {
       Console.WriteLine("myArray[{0}] = {1}", i, x);
    }
    Console.WriteLine(hogehoge);
  }
}
