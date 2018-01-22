using System;

namespace DistanceConverter
{
  class Program
  {
    static void Main(string[] args)
    {
      if (args.Length >= 1 && args[0] == "-tom")
      {
        PrintFeetToMeterList(1, 10);
      }
      else
      {
        PrintMeterToFeetList(1, 10);
      }
    }

    // フィートからメートルへの対応表を出力
    static void PrintFeetToMeterList(int start, int stop)
    {
      for (int feet = start; feet <= stop; feet++)
      {
        double meter = FeetConverter.FeetToMeter(feet);
        Console.WriteLine("{0} ft = {1:0.0000} m ", feet, meter);
      }
    }

    // メートルからフィートへの対応表を出力
    static void PrintMeterToFeetList(int start, int stop)
    {
      for (int meter = start; meter <= stop; meter++)
      {
        double feet = FeetConverter.MeterToFeet(meter);
        Console.WriteLine("{0} m = {1:0.0000} ft ", meter, feet);
      }
    }
  }
  public static class FeetConverter
  {
    private const double ratio = 0.3048;
    //フィートからメートルを求める
    public static double FeetToMeter(double feet)
    {
      return feet * ratio;
    }

    //メートルからフィートを求める
    public static double MeterToFeet(double meter)
    {
      return meter / ratio;
    }
  }
}
