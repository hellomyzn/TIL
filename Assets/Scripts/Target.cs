using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Target : MonoBehaviour {
	public GameObject rayControl;
	RayControl rayControlScript;
	Animator anim;

	// Use this for initialization
	void Start () {
		rayControlScript = rayControl.GetComponent<RayControl>();
		anim = GetComponent<Animator>();
	}
	// Update is called once per frame
	void Update () {
		TargetDown();		
	}
	void TargetDown(){
		if(rayControlScript.targetLife == 0){
			anim.SetBool("IsDown",true);
			rayControlScript.targetLife = 5;
			Invoke("TargetUp",10f);
		}	
	}

	void TargetUp(){
		anim.SetBool("IsDown",false);
	}
}
