using UnityEngine;

public class InputManager : MonoBehaviour 
{
	RaycastHit hit;		

	//void Start () 
	//{
	//	
	//}
	void Update () 
	{
		if (!Input.GetMouseButtonDown(0)) return;
		
		if(!Physics.Raycast(Camera.main.ScreenPointToRay(Input.mousePosition), out hit)) return;
		
		var button = hit.collider.GetComponent<IButton>();
		if(button != null) button.Press();
	}
}
