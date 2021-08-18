<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Repositories\BaseRepository;

use App\Repositories\Auth\UserRepository;
use App\Repositories\Ilumukita\Interfaces\IlumukitaUserInterface;
use App\Repositories\Blogcrud\BlogcrudUserRepository;
use App\Repositories\Simablog\SimablogUserRepository;
use App\Repositories\Simplenote\SimplenoteUserRepository;
use App\Repositories\Laracasts\LaracastsUserRepository;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserService extends BaseRepository
{
    /**
     * @var
     */
    protected $userRepository;

    /**
     * @var
     */
    protected $ilumukitaUserRepository;

    /**
     * @var
     */
    protected $blogcrudUserRepository;

    /**
     * @var
     */
    protected $simablogUserRepository;

    /**
     * @var
     */
    protected $simplenoteUserRepository;

    /**
     * @var
     */
    protected $laracastsUserRepository;

    /**
     * UserRepository constructor.
     */
    public function __construct(
        User $model, 
        UserRepository $userRepository,
        IlumukitaUserInterface $ilumukitaUserRepository,
        BlogcrudUserRepository $blogcrudUserRepository,
        SimablogUserRepository $simablogUserRepository,
        SimplenoteUserRepository $simplenoteUserRepository,
        LaracastsUserRepository $laracastsUserRepository
    ) {
        $this->model = $model;
        $this->userRepository = $userRepository;
        $this->ilumukitaUserRepository = $ilumukitaUserRepository;
        $this->blogcrudUserRepository = $blogcrudUserRepository;
        $this->simablogUserRepository = $simablogUserRepository;
        $this->simplenoteUserRepository = $simplenoteUserRepository;
        $this->laracastsUserRepository = $laracastsUserRepository;
    }

    /**
     * Undocumented function
     *
     * @param array $attributes
     * @param User $userRole
     * @return User
     */
    public function create(array $attributes, $userRole)
    {
        return DB::transaction(function () use ($attributes, $userRole) {
            // TODO User create using user repository
            $user = $this->createUser($attributes);

            if ($userRole == User::USER_ROLE_BLOGCRUD) {
                $blogcrudUser = $this->createBlogcrudUser($attributes, $user['id']);
            }else if ($userRole == User::USER_ROLE_SIMABLOG) {
                $simalogUser = $this->createSimablogUser($attributes, $user['id']);
            }else if ($userRole == User::USER_ROLE_LARACASTS) {
                $laracastsUser = $this->createLaracastsUser($attributes, $user['id']);
            }else if ($userRole == User::USER_ROLE_SIMPLENOTE){
                $simplenoteuser = $this->createSimplenoteUser($attributes, $user['id']);
            }else if ($userRole == User::USER_ROLE_ILUMUKITA){
                $ilumukitaUser = $this->createIlumukitaUser($attributes, $user['id']);
            }

            // Return the user object
            return $user;
        });
    }

    /**
     * Arrange data, give data to repository function
     *
     * @param array $attributes
     * @return void
     */
    private function createUser($attributes)
    {
        $data = [
            'email' => $attributes['email'] ?? '',
            'password' => Hash::make($attributes['password']) ?? '',
        ];

        return $this->userRepository->save($data);
    }

    /**
     * Arrange data, give data to repository function
     *
     * @param array $attributes
     * @param int $user_id
     * @return void
     */
    private function createIlumukitaUser($attributes, $user_id)
    {
        $data = [
            'name' => $attributes['name'] ?? '',
            'user_id' => $user_id ?? '',
        ];

        return $this->ilumukitaUserRepository->save($data);
    }

    /**
     * Arrange data, give data to repository function
     *
     * @param array $attributes
     * @param int $user_id
     * @return void
     */
    private function createBlogcrudUser($attributes, $user_id)
    {
        $data = [
            'name' => $attributes['name'] ?? '',
            'user_id' => $user_id ?? '',
        ];

        return $this->blogcrudUserRepository->save($data);
    }

    /**
     * Arrange data, give data to repository function
     *
     * @param array $attributes
     * @param int $user_id
     * @return void
     */
    private function createSimablogUser($attributes, $user_id)
    {
        $data = [
            'name' => $attributes['name'] ?? '',
            'user_id' => $user_id ?? '',
        ];

        return $this->simablogUserRepository->save($data);
    }

    /**
     * Arrange data, give data to repository function
     *
     * @param array $attributes
     * @param int $user_id
     * @return void
     */
    private function createSimplenoteUser($attributes, $user_id)
    {
        $data = [
            'name' => $attributes['name'] ?? '',
            'user_id' => $user_id ?? '',
        ];

        return $this->simplenoteUserRepository->save($data);
    }

    /**
     * Arrange data, give data to repository function
     *
     * @param array $attributes
     * @param int $user_id
     * @return void
     */
    private function createLaracastsUser($attributes, $user_id)
    {
        $data = [
            'name' => $attributes['name'] ?? '',
            'username' => $attributes['username'] ?? '',
            'user_id' => $user_id ?? '',
        ];

        return $this->laracastsUserRepository->save($data);
    }
}
