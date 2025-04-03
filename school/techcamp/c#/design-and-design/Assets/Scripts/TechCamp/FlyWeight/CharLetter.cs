using UnityEngine;

public class CharLetter : MonoBehaviour 
{
	public char singleletter;
	public CharLetter(char c)
	{
		singleletter = c;
	}
	public void ShowCharLetter()
	{
		print(singleletter);
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
