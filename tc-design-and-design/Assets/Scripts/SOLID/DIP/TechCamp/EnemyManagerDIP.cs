using System.Collections.Generic;
using UnityEngine;

public class EnemyManagerDIP : MonoBehaviour {

    List<IEnemy> enemies;

    public EnemyManagerDIP(List<IEnemy> enemies) { 
        this.enemies = enemies;
    }

    public void Move() {
        foreach(var enemy in enemies) {
            enemy.Move();
        }
    }
}