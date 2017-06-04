using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class RayControl : MonoBehaviour {
	public GameObject sparkle;
	public Renderer sparkle2;
	public float bulletInterval;
	GameObject bullet;


	// Use this for initialization
	void Start () {
		sparkle2 = sparkle2.GetComponent<Renderer>();
		bulletInterval = 0;
	}
	
	// Update is called once per frame
	void Update () {
		bulletInterval += Time.deltaTime;
		if(Input.GetMouseButtonDown(0)){
			if (bulletInterval >= 0.3f) {
				GenerateBullet ();
			}				
		}	

		if(Input.GetMouseButtonUp(0)){
			sparkle2.enabled = false;
			Destroy(bullet);
		}					
	}

	void GenerateBullet(){
		bulletInterval = 0.0f;
		sparkle2.enabled = true;
		Ray ray = Camera.main.ScreenPointToRay(Input.mousePosition);
		RaycastHit hit;
		if(Physics.Raycast(ray, out hit)){			
			bullet = Instantiate(sparkle,hit.point, Quaternion.identity);
		}
	}
}
