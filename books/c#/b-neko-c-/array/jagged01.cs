using System;

class Jagged01
{
  public static void Main()
  {
    int[][] ar;

    ar = new int[2][];
    ar[0] = new int[3];
    ar[1] = new int[3];

    for (int i = 0; i < 2; i++)
    {
      for (int j = 0; j < 3; j++)
      {
        ar[i][j] = (i + 1) * (j + 1);
      }
    }
    for (int i = 0; i < 2; i++)
    {
      for (int j = 0; j < 3; j++)
      {
        Console.WriteLine("ar[{0}][{1}] = {2}", i, j, ar[i][j]);
      }
    }
  }
}
