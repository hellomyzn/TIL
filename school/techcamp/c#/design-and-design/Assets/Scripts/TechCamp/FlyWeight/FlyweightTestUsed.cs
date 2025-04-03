using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class FlyweightTestUsed : MonoBehaviour 
{
	void Start () 
	{
		var document = "iamaman";
		var chars = document.ToCharArray();

		var letterFactory = LetterFactory.GetInstance();

		foreach (var c in chars)
		{
			CharLetter charLetter = letterFactory.GetLetter(c);
			charLetter.ShowCharLetter();
		}
	}
	
}
