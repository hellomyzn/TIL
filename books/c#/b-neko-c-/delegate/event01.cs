using System;

delegate void MyDelegate();
class MyEventClass
{
  public event MyDelegate EventName;
  public void OnEventName()
  {
    if(EventName != null) EventName();
  }
}

class MyClass
{
  public void Show()
  {
    Console.WriteLine("Show");
  }
}

class MyClass2
{
  public void Show2()
  {
    Console.WriteLine("Show2!!");
  }
}

class Event01
{
  public static void Main()
  {
    MyClass mc = new MyClass();
    MyClass2 mc2 = new MyClass2();
    MyEventClass myEvent = new MyEventClass();

    myEvent.EventName += new MyDelegate(mc.Show);
    myEvent.EventName += new MyDelegate(mc2.Show2);

    myEvent.OnEventName();
  }
}
