using UnityEngine;

public class Enemy2DIP : MonoBehaviour, IEnemy {

    private int hp;
    private int speed;
    private Vector3 position = new Vector3(0, 0, 0);

    public Enemy2DIP(int hp, int speed) {
        this.hp = hp;
        this.speed = speed;
    }

    public void Move() {
        position += Vector3.forward * Time.deltaTime * speed;
        print ("Enemy2 Position:" + position);
    }
}