using UnityEngine;

public class StateWalk : MonoBehaviour, IState
{
    private readonly float speed;

    public StateWalk(float speed)
    {
        this.speed = speed;
    }

    public void Move()
    {
        print("speedB = " + speed + "で歩いています");
    }
}