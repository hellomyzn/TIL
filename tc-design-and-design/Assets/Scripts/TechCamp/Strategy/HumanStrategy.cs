using System;

public class HumanStrategy
{
    public string name;
    public int height = -1;
    public int weight = -1;
    public int age = -1;

    public HumanStrategy(string name, int height, int weight, int age)
    {
        this.name = name;
        this.height = height;
        this.weight = weight;
        this.age = age;
    }

}