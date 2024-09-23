public class Product
{
  public int Code { get; set; }
  public string Name { get; set; }
  public int Price { get; set; }

  //コンストラクタ
  public Product(int code, string name, int price)
  {
    this.Code = code;
    this.Name = name;
    this.Price = price;
  }

  // 消費税額を求める(消費税率は8%)
  public int GetTax()
  {
    return(int)(Price * 0.08);
  }

  // 税込価格を求める
  public int GetPriceIncludingTax
  {
    return Price + GetTax();
  }
}
