using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using System;

public class Dog : MonoBehaviour 
{

	private Vector3 _target;

	public delegate void DogDelegate(string text);

	public DogDelegate OnAlived;

	public void Go(Vector3 target)
	{
		_target = target;
	}

	private void Update()
	{
		transform.position += (_target - transform.position).normalized * Time.deltaTime;
		
		if((transform.position - _target).magnitude < 0.1f)
		{
			OnAlived("なでなで");
		}
	}
}
