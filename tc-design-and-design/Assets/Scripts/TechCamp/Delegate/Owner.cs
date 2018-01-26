using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Owner : MonoBehaviour 
{
	[SerializeField] private Dog _dog;
	private void Start()
	{
		_dog.Go(transform.position);

		_dog.OnAlived += (text) =>
		{
			Debug.Log(text);
		};
	}
	//void Start () 
	//{
	//	
	//}
	
	//void Update () 
	//{
	//	
	//}
}