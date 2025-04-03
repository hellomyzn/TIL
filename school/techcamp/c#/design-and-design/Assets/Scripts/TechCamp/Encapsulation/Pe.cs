using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Pe : MonoBehaviour 
{

	private int _experience = 0;


	public int Experience{get; set;}
	public int ExperienceNoSet{get;}
	public int ExperiencePrivate{get; private set;}


	public int ExperienceGate
	{
		get
		{
			/*変数をせっかく隠蔽したのに、get(取得してるだけでこのままでは何も処理なし)で
			変数を変更してしまうのは隠蔽した意味がありません。
			変数を変更するためにはsetアクセサを使いましょう。*/
			return ++_experience;
		}

		set
		{
			if(_experience < 10)_experience = 10;
		}
	}
	void Start () 
	{
		//setアクセサーがないからエラーになる
		// ExperienceNoSet = 10;
		print("PeクラスでのExperienceNoSet"+ExperienceNoSet);

		//private set;だから自分のクラスだと値の変更ができる
		ExperiencePrivate = 10;
		print("PeクラスでのExperiencePrivate"+ExperiencePrivate);
	}
	
	//void Update () 
	//{
	//	
	//}
}
