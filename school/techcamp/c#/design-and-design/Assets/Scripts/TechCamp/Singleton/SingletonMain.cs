using UnityEngine;

public class SingletonMain : MonoBehaviour {
    private SingletonPattern sample1;
    private SingletonPattern sample2;
    private SingletonSampleObject sample3;
    private SingletonSampleObject sample4;

    // Use this for initialization
    void Start () {
        sample1 = SingletonPattern.GetInstance;
        sample2 = SingletonPattern.GetInstance;

        if (sample1 == sample2){
            print("sample1 == sample2");
        }

        print(sample2.testNum);
        sample1.setNum(100);
        print(sample2.testNum);

        sample3 = SingletonSampleObject.GetInstance;
        sample4 = SingletonSampleObject.GetInstance;

        if (sample3 == sample4) {
            print("sample3 == sample4");
        }
    }
}