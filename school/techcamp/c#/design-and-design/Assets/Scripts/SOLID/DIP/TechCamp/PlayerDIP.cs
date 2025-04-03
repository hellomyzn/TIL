using System.Collections.Generic;
using UnityEngine;

public class PlayerDIP : MonoBehaviour {

    private List<IEnemy> enemies;
    private EnemyManagerDIP enemyManager;

    // Use this for initialization
    void Start () {
        Initialize();

        enemyManager = new EnemyManagerDIP(enemies);
    }

    // Update is called once per frame
    void Update () {
        enemyManager.Move();
    }

    void Initialize() {
        enemies = new List<IEnemy>();
        enemies.Add(new Enemy1DIP(transform));
        enemies.Add(new Enemy2DIP(20, 50));
    }
}