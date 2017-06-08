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
	public void AddScore(){
		score += 20;
	}
	public void AddHeadMarkerLow(){
		score += 50;
	}

	public void AddHeadMarkerHigh(){
		score += 100;
	}
}
