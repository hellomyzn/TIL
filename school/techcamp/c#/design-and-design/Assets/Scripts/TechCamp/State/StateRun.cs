using UnityEngine;

public class StateRun : MonoBehaviour, IState
{
    private readonly float speed;
    public StateRun(float speed)
    {
        this.speed = speed;
    }
    public void Move()
    {
        print("speedA = " + speed + "で走ってます");
    }
}