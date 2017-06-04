using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class RayControl : MonoBehaviour {
	public GameObject sparkle;
	public Renderer sparkle2;
    public GameControl gameControl;
	GameObject bullet;


	// Use this for initialization
	void Start () {
		sparkle2 = sparkle2.GetComponent<Renderer>();
	}
	
	// Update is called once per frame
	void Update () {
		if(gameControl.shot == true){
			GenerateBullet();
		}else if(gameControl.shot == false){
			DestroyBullet(); 
		}
	}

	void GenerateBullet(){
		sparkle2.enabled = true;
		Ray ray = Camera.main.ScreenPointToRay(Input.mousePosition);
		Debug.DrawRay(ray.origin, ray.direction, Color.red, 3.0f);
		RaycastHit hit;
		if(Physics.Raycast(ray, out hit)){			
			bullet = Instantiate(sparkle,hit.point, Quaternion.identity);
		}
		
	}
  
  void DestroyBullet(){
		sparkle2.enabled = false;
		Destroy(bullet);       
  }
}
