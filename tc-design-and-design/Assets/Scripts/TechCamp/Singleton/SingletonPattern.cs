using UnityEngine;

public class SingletonPattern : MonoBehaviour 
{    private static SingletonPattern instance = new SingletonPattern();

    private SingletonPattern(){
        Debug.Log("Create SingletonSample instance.");
    }

    public static SingletonPattern GetInstance{
        get{
            if (instance == null) {
                instance = new SingletonPattern ();
            }

            return instance;
        }
    }

    public int testNum = 10;

    public void setNum(int num){
        testNum = num;
    }
}

