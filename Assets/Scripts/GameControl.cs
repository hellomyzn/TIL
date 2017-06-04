using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class GameControl : MonoBehaviour {
  public float bulletInterval;
  public bool shot;

	// Use this for initialization
	void Start () {
		shot =false;
		bulletInterval = 0;
	}
	
	// Update is called once per frame
	void Update () {
		bulletInterval += Time.deltaTime;
		if(Input.GetMouseButtonDown(0)){
			if (bulletInterval >= 0.3f){
				shot = true;
				bulletInterval = 0.0f;        	

			}				
		}else if(Input.GetMouseButtonUp(0) || Input.GetMouseButton(0)){
        	shot = false;
		}					
	}
}
