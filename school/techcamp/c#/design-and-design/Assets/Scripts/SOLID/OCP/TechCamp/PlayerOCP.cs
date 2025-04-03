using UnityEngine;
public class PlayerOCP : MonoBehaviour 
{
	[SerializeField] private Vector3 _velocity;
	private IPlayState _state;
	public void Awake()
	{
		_state = new Run(_velocity, transform);
	}

	public void Update()
	{
		_state.Move();
	}
}
