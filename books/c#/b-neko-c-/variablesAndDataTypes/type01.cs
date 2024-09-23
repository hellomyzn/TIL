using System;


class Type01
{
  public static void Main()
  {
    Console.WriteLine("sbyte: {0} ~ {1}", sbyte.MinValue, sbyte.MaxValue);
    Console.WriteLine("Short: {0} ~ {1}", short.MinValue, short.MaxValue);
    Console.WriteLine("int: {0} ~ {1}", int.MinValue, int.MaxValue);
    Console.WriteLine("long: {0} ~ {1}", long.MinValue, long.MaxValue);

    Console.WriteLine();

    Console.WriteLine("byte: {0} ~ {1}", byte.MinValue, byte.MaxValue);
    Console.WriteLine("ushort: {0} ~ {1}", ushort.MinValue, ushort.MaxValue);
    Console.WriteLine("uint: {0} ~ {1}", uint.MinValue, uint.MaxValue);
    Console.WriteLine("ulong: {0} ~ {1}", ulong.MinValue, ulong.MaxValue);
  }
}
