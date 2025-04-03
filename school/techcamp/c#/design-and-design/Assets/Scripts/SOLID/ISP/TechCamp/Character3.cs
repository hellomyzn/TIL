using UnityEngine;

public class Character3 : MonoBehaviour,IReadOnlyCharacterStatus
{
    public int HP { get; }
    public int MP { get; }
    public int ATK { get; }
    public int DEF { get; }
    public int INT { get; }
    public int RES { get; }
    public int SPD { get; }
}