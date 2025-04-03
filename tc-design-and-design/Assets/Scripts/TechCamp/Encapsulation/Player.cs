using UnityEngine;

public class Player : MonoBehaviour 
{
	void Start () 
	{
		/* Experienceプロパティの値を変えて出力 */
		Pe pe = new Pe();
		print("Experienceオブジェクト"+pe.Experience);
		pe.Experience = 4;
		print("Experienceオブジェクト"+pe.Experience);

		/* ExperienceNoSetの値は変えられないので前後で同じ出力*/
		print("ExperienceNoSetオブジェクト"+pe.ExperienceNoSet);
		//ここはエラーになるのでコメントアウト
		//pe.ExperienceNoSet = 5;
		print("ExperienceNoSetオブジェクト"+pe.ExperienceNoSet);

		/* ExperiencePrivateの値も変えられないので前後で同じ出力*/
		print("ExperiencePrivateオブジェクト" + pe.ExperiencePrivate);
		//ここはエラーになるのでコメントアウト
		// pe.ExperiencePrivate = 8;
		print("ExperiencePrivateオブジェクト" + pe.ExperiencePrivate);


		/* ExperienceGateはsetに最大地制限がかかっていて、getアクセサーで1足される */
		pe.ExperienceGate = 20;
		print("ExperienceGateオブジェクト"+ pe.ExperienceGate);
	}
	
	//void Update () 
	//{
	//	
	//}
}
