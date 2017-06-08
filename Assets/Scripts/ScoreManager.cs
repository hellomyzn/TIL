using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class ScoreManager : MonoBehaviour {
	public int score;
	// Use this for initialization
	void Start () {
		score = 0;
	}
	
	// Update is called once per frame
	void Update () {
		
	}
	public void AddScore(float HeadMarkerPoint,RaycastHit hit,Target targetScript){
		if(hit.collider.gameObject.tag == "Target"){
			targetScript.targetLife --;
			score += 20;
			
		}else if(hit.collider.gameObject.tag == "HeadMarker"){
			targetScript.targetLife--;
			AddHeadMarker(HeadMarkerPoint);
			print(HeadMarkerPoint);
		}		
	}

	void AddHeadMarker(float HeadMarkerPoint){
		if(HeadMarkerPoint < 1.0f){
			score += 100;
		}else{
			score += 50;
		}
	}

	
}
