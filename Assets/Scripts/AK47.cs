using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class AK47 : MonoBehaviour {
	AudioClip shotSound;
	AudioSource audioSource;
	public GameControl gameControl;


	// Use this for initialization
	void Start () {
		shotSound = Resources.Load<AudioClip>("Audio/fire");
		audioSource  = GetComponent<AudioSource>();		
	}
	
	// Update is called once per frame
	void Update () {	
		if(gameControl.shot == true){
			audioSource.PlayOneShot(shotSound);
		}
	}
}
