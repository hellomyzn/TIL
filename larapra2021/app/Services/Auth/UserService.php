<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Repositories\BaseRepository;

use App\Services\Blogcrud\BlogcrudUserService;
use App\Services\Simablog\SimablogUserService;
use App\Services\Laracasts\LaracastsUserService;
use App\Services\Simplenote\SimplenoteUserService;
use App\Repositories\Auth\UserRepository;
use App\Repositories\Ilumukita\IlumukitaUserRepository;
use App\Repositories\Blogcrud\BlogcrudUserRepository;
use App\Repositories\Simablog\SimablogUserRepository;

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
    protected $blogcrudUserService;

    /**
     * @var
     */
    protected $simablogUserService;

    /**
     * @var
     */
    protected $laracastsUserService;

    /**
     * @var
     */
    protected $simplenoteUserService;

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
     * UserRepository constructor.
     */
    public function __construct(
        User $model, 
        UserRepository $userRepository,
        BlogcrudUserService $blogcrudUserService,
        SimablogUserService $simablogUserService,
        LaracastsUserService $laracastsUserService,
        SimplenoteUserService $simplenoteUserService,
        IlumukitaUserRepository $ilumukitaUserRepository,
        BlogcrudUserRepository $blogcrudUserRepository,
        SimablogUserRepository $simablogUserRepository
    ) {
        $this->model = $model;
        $this->userRepository = $userRepository;
        $this->blogcrudUserService = $blogcrudUserService;
        $this->simablogUserService = $simablogUserService;
        $this->laracastsUserService = $laracastsUserService;
        $this->ilumukitaUserRepository = $ilumukitaUserRepository;
        $this->blogcrudUserRepository = $blogcrudUserRepository;
        $this->simablogUserRepository = $simablogUserRepository;
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
                $user = $this->createBlogcrudUser($attributes, $user['id']);
            }else if ($userRole == User::USER_ROLE_SIMABLOG) {
                $user = $this->createSimablogUser($attributes, $user['id']);
            }else if ($userRole == User::USER_ROLE_LARACASTS) {
                $attributes['username'] = $data['username'];

                $user = $this->laracastsUserService->createLaracastsAccount($attributes);
            }else if ($userRole == User::USER_ROLE_SIMPLENOTE){
                $user = $this->simplenoteUserService->createSimplenoteAccount($attributes);
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
}
