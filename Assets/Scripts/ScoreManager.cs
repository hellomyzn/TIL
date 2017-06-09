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
	public void AddHeadMarker(float HeadMarkerPoint){
		if(HeadMarkerPoint < 1.0f){
			score += 100;
		}else{
			score += 50;
		}
	}
}
