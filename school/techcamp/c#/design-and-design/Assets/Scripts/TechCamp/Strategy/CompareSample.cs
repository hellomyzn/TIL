using UnityEngine;

public class CompareSample : MonoBehaviour {

    private IComparator comparator = null;
    private int resultHeight = 0;
    private int resultAge = 0;


    void Start(){
        HumanStrategy h1 = new HumanStrategy("Yamada", 170, 60, 20);
        HumanStrategy h2 = new HumanStrategy("Sato", 175, 55, 20);
        comparator = new AgeComparator();
        resultAge = Compare(h1, h2);

        comparator = new HeightComparator();
        resultHeight = Compare(h1, h2);

        print("age :" + resultAge);
        print("height :" + resultHeight);
    }

    public int Compare(HumanStrategy h1,HumanStrategy h2){
        return comparator.compare(h1,h2);
    }
}