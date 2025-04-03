using UnityEngine;

public class Letter : MonoBehaviour 
{
	private string letter;
	public Letter(string text)
	{
		this.letter = text;
	}
	public void ShowLetter()
	{
		print(letter);
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
