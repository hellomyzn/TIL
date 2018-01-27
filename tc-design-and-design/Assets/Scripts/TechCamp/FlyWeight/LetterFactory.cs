
using System.Collections.Generic;


public class LetterFactory
{
	private readonly Dictionary<char, CharLetter> dict = new Dictionary<char, CharLetter>();
	private static LetterFactory _instance;
	private LetterFactory()
	{
		return;
	}
	public static LetterFactory GetInstance()
	{
		if(_instance == null)
		{
			_instance =  _instance = new LetterFactory();
		}

		return _instance;
	}

	public CharLetter GetLetter(char c)
	{
		if(dict.ContainsKey(c))
		{
			return dict [c];
		}

		var unUsedletter = new CharLetter(c);
		dict.Add(c, unUsedletter);

		return unUsedletter;
	}
}