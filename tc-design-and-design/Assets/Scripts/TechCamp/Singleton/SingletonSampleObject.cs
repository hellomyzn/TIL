using UnityEngine;

public class SingletonSampleObject : MonoBehaviour {

    private static SingletonSampleObject mInstance;

    private SingletonSampleObject () { // Private Constructor
        Debug.Log("Create SampleSingleton GameObject instance.");
    }

    public static SingletonSampleObject GetInstance {
        get {
            if( mInstance == null ) {
                GameObject go = new GameObject("SingletonSample");
                mInstance = go.AddComponent<SingletonSampleObject>();
            }
            return mInstance;
        }
    }
}
