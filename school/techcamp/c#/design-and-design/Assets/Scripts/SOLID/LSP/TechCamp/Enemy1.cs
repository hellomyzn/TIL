using UnityEngine;

public class Enemy1 : MonoBehaviour, IMovable, IDamaged, IDestroyable
{
    [SerializeField] private GameObject bomb;
    public int HP{ get; set; }

    public void Damage(int value)
    {
        HP -= value;
    }

    public void Destroy()
    {
        Instantiate(bomb);
        Destroy(gameObject);
    }

    public void MoveTo(Vector3 pos)
    {
        transform.position += pos;
    }
}