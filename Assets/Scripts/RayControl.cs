using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class RayControl : MonoBehaviour {
	public GameObject sparkle;
	public Renderer sparkle2;
	GameObject bullet;


	// Use this for initialization
	void Start () {
		sparkle2 = sparkle2.GetComponent<Renderer>();
	}
	
	// Update is called once per frame
	void Update () {
	}

	public void GenerateBullet(){
		sparkle2.enabled = true;
		Ray ray = Camera.main.ScreenPointToRay(Input.mousePosition);
		Debug.DrawRay(ray.origin, ray.direction, Color.red, 3.0f);
		RaycastHit hit;
		if(Physics.Raycast(ray, out hit)){			
			bullet = Instantiate(sparkle,hit.point, Quaternion.identity);
		}
		
	}
  
  public void DestroyBullet(){
		sparkle2.enabled = false;
		Destroy(bullet);       
  }
}
