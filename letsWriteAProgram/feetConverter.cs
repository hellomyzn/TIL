using System;

namespace DistanceConverter
{
  // フィートとメートルの単位変換クラス
  public static class FeetConverter
  {
    private const double ratio = 0.3048;
    //フィートからメートルを求める
    public static double FeetToMeter(int feet)
    {
      return feet * ratio;
    }

    //メートルからフィートを求める
    public static double MeterToFeet(int meter)
    {
      return meter / ratio;
    }
  }
}
