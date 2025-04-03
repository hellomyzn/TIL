using UnityEngine;

public class Cube : MonoBehaviour {
    private float activeTime = 0;

    // Update is called once per frame
    void Update () {
        if (gameObject.activeInHierarchy) {
            activeTime += Time.deltaTime;
        }

        if (activeTime > 1.0f) {
            gameObject.SetActive(false);
            activeTime = 0;
        }
    }
}