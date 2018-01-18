using System;
using System.Collections.Generic;

class Book
{
  public string title;
  public string author;
  public decimal price;
}

class List03
{
  public static void Main()
  {
    List<Book> myBook = new List<Book>
    {
      new Book
      {
        title = "吾輩は猫である",
        author = "夏目漱石",
        price = 1050
      },

      new Book
      {
        title = "雲の階段",
        author = "渡辺淳一",
        price = 1600
      },
      new Book
      {
        title = "こころ",
        author = "夏目漱石",
        price = 1200
      }
    };

    Console.WriteLine("-----蔵書一覧--------");
    foreach (Book b in myBook)
    {
      Console.WriteLine("{0}, {1}, {2}円", b.title, b.author, b.price);
    }
  }
}
