using UnityEngine;

public class Enemy1DIP :MonoBehaviour, IEnemy
{
    private Transform target;
    private Vector3 position = new Vector3(0,0,0);

    public Enemy1DIP(Transform target)
    {
        this.target = target;
    }

    public void Move()
    {
        position = Vector3.Lerp (position, target.position, Time.deltaTime);
        print("Enemy1 position" + position);
    }
}