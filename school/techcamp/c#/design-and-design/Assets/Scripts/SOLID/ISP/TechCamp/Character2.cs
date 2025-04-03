using UnityEngine;

public class Character2 : MonoBehaviour, ISettableCharacterStatus, ICharacterState
{
    public int HP { get; set; }
    public int MP { get; set; }
    public int ATK { get; set; }
    public int DEF { get; set; }
    public int INT { get; set; }
    public int RES { get; set; }
    public int SPD { get; set; }
    [SerializeField] private int  downLevel;

    public void Damage (int point) {
        HP -= point;
    }

    void ATKDown(ISettableCharacterStatus character) {
        character.ATK -= downLevel;
    }

}