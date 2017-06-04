using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class AK47 : MonoBehaviour {
	AudioClip getItemSound;
	AudioSource audioSource;
	public RayControl rayControl;


	// Use this for initialization
	void Start () {
		getItemSound = Resources.Load<AudioClip>("Audio/fire");
		audioSource  = GetComponent<AudioSource>();		
	}
	
	// Update is called once per frame
	void Update () {	
		if(Input.GetMouseButtonDown(0)){
			if (rayControl.bulletInterval >= 0.3f) {
				audioSource.PlayOneShot(getItemSound);
			}
		}
		if(Input.GetMouseButtonUp(0)){

		}
	}
}
