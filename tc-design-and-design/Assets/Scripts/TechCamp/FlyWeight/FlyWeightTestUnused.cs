using UnityEngine;

public class FlyWeightTestUnused : MonoBehaviour 
{
	void Start()
	{
		var instance_i = new Letter("i");
		instance_i.ShowLetter();
		var instance_a = new Letter("a");
		instance_a.ShowLetter();
		var instance_m = new Letter("m");
		instance_m.ShowLetter();
		var instance_a_1 = new Letter("a");
		instance_a_1.ShowLetter();
		var instance_m_1 = new Letter("m");
		instance_m_1.ShowLetter();
		var instance_a_2 = new Letter("a");
		instance_a_2.ShowLetter();
		var instance_n = new Letter("n");
		instance_n.ShowLetter();
	}
}
