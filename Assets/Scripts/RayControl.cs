using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class RayControl : MonoBehaviour {
	public GameObject sparkle;
	public Renderer sparkle2;
	public GameObject firstPersonCharacter;
	public GameObject scoreManager;
	public GameObject target;
	Target targetScript;
	ScoreManager scoreManagerScript;
	GameObject bullet;
	Camera camera;
	
	

	// Use this for initialization
	void Start () {
		sparkle2 = sparkle2.GetComponent<Renderer>();
		camera = firstPersonCharacter.GetComponent<Camera>();
		scoreManagerScript = scoreManager.GetComponent<ScoreManager>();
		targetScript = target.GetComponent<Target>();
	}
	
	// Update is called once per frame
	void Update () {
	}
	public void GenerateBullet(){
		sparkle2.enabled = true;
		Ray ray = camera.ViewportPointToRay(new Vector3(0.5f,0.5f,0));
		Debug.DrawRay (ray.origin, ray.direction * 100, Color.red, 3, false);
		RaycastHit hit;
		if(Physics.Raycast(ray, out hit)){			
			Vector3 bulletPosition = (hit.point - ray.origin).normalized;
			bullet = Instantiate(sparkle,hit.point - bulletPosition, Quaternion.identity);
			Vector3 hitPoint = hit.point;
			Vector3 targetPoint = hit.collider.gameObject.transform.position;
			// print(hit.collider.gameObject.name + hitPoint + targetPoint);

			if(hit.collider.gameObject.name == "pCube1"){
				targetScript.targetLife --;
				scoreManagerScript.AddScore();
				
			}else if(hit.collider.gameObject.name == "HeadMarkerSensor"){
				targetScript.targetLife--;
				float HeadMarkerPoint= (targetPoint - hitPoint).magnitude * 10;
				if(HeadMarkerPoint < 1){
					scoreManagerScript.AddHeadMarkerHigh();
				}else{
					scoreManagerScript.AddHeadMarkerLow();
				}
			}
		}
	}
  
  public void DestroyBullet(){
		sparkle2.enabled = false;
		Destroy(bullet);       
  }
}
