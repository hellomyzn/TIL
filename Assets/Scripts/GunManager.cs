using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class GunManager : MonoBehaviour {

  public float bulletInterval;
  public GameObject audioControll;
  public RayControl raycontroll;
  RayControl raycontrollScript;
  AudioControl audioControllScript;

	// Use this for initialization
	void Start () {
		bulletInterval = 0;
		audioControllScript = audioControll.GetComponent<AudioControl>();
		raycontrollScript = raycontroll.GetComponent<RayControl>();
	}
	
	// Update is called once per frame
	void Update () {
		bulletInterval += Time.deltaTime;
		if(Input.GetMouseButtonDown(0)){
			if (bulletInterval >= 0.3f){
				bulletInterval = 0.0f;  
				audioControllScript.GunShot();
				raycontrollScript.GenerateBullet();

			}				
		}else if(Input.GetMouseButtonUp(0) || Input.GetMouseButton(0)){
			raycontrollScript.DestroyBullet();
		}					
	}
}
