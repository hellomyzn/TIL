
using UnityEngine;

public class Walk : MonoBehaviour , IPlayState
{
	private readonly Vector3 _velocity;
	private readonly  Transform _transform;

	public Walk(Vector3 velocity, Transform transform)
	{
		_velocity = velocity;
		_transform = transform;
	}

	public void Move()
	{
		_transform.position += _velocity;
	}
}
