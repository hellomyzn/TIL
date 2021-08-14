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
     * UserRepository constructor.
     */
    public function __construct(
        User $model, 
        UserRepository $userRepository,
        BlogcrudUserService $blogcrudUserService,
        SimablogUserService $simablogUserService,
        LaracastsUserService $laracastsUserService,
        SimplenoteUserService $simplenoteUserService,
        IlumukitaUserRepository $ilumukitaUserRepository
    ) {
        $this->model = $model;
        $this->userRepository = $userRepository;
        $this->blogcrudUserService = $blogcrudUserService;
        $this->simablogUserService = $simablogUserService;
        $this->laracastsUserService = $laracastsUserService;
        $this->ilumukitaUserRepository = $ilumukitaUserRepository;
    }

    /**
     * @throws \Exception
     * @throws \Throwable
     *
     * @return \Illuminate\Database\Eloquent\Model|mixed
     */
    public function create(array $attributes, $userRole)
    {
        return DB::transaction(function () use ($attributes, $userRole) {
            // TODO User create using user repository
            $user = $this->createUser($attributes);

            if ($userRole == User::USER_ROLE_BLOGCRUD) {
                $user = $this->blogcrudUserService->createBlogcrudAccount($attributes);
            }else if ($userRole == User::USER_ROLE_SIMABLOG) {
                $user = $this->simablogUserService->createSimablogAccount($attributes);
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

    private function createUser($attributes){
        $data = [
            'email' => $attributes['email'] ?? '',
            'password' => Hash::make($attributes['password']) ?? '',
        ];

        return $this->userRepository->save($data);
    }

    private function createIlumukitaUser($attributes, $user_id)
    {
        $data = [
            'name' => $attributes['name'] ?? '',
            'user_id' => $user_id ?? '',
        ];

        return $this->ilumukitaUserRepository->save($data);
    }
}
