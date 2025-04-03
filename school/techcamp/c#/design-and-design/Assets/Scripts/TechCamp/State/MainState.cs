using System.Collections;
using UnityEngine;

public class MainState : MonoBehaviour
{
    private IState status;
    private float speed;

    void Start()
    {
        status = new StateRun(100f);
        StartCoroutine(TransitionState());
    }

    void Update()
    {
        status.Move();
    }

    IEnumerator TransitionState()
    {
        yield return new WaitForSeconds(3f);
        status = new StateWalk(50f);
    }
}