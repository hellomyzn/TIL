<?php

namespace App\Repositories\Auth;

use App\Models\User;
use App\Repositories\BaseRepository;

use App\Services\Blogcrud\BlogcrudUserService;
use App\Services\Simablog\SimablogUserService;
use App\Services\Laracasts\LaracastsUserService;
use App\Services\Simplenote\SimplenoteUserService;
use App\Services\Ilumukita\IlumukitaUserService;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserRepository extends BaseRepository
{
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
     * UserRepository constructor.
     */
    public function __construct(
        User $model, 
        BlogcrudUserService $blogcrudUserService,
        SimablogUserService $simablogUserService,
        LaracastsUserService $laracastsUserService,
        SimplenoteUserService $simplenoteUserService,
        IlumukitaUserService $ilumukitaUserService
    ) {
        $this->model = $model;
        $this->blogcrudUserService = $blogcrudUserService;
        $this->simablogUserService = $simablogUserService;
        $this->laracastsUserService = $laracastsUserService;
        $this->ilumukitaUserService = $ilumukitaUserService;
    }

    /**
     * @throws \Exception
     * @throws \Throwable
     *
     * @return \Illuminate\Database\Eloquent\Model|mixed
     */
    public function create(array $data, $userRole)
    {
        return DB::transaction(function () use ($data, $userRole) {
            $requestData = [
                'name' => $data['name'] ?? '',
                'email' => $data['email'] ?? '',
                'password' => Hash::make($data['password']) ?? '',
            ];

            if ($userRole == User::USER_ROLE_BLOGCRUD) {
                $user = $this->blogcrudUserService->createBlogcrudAccount($requestData);
            }else if ($userRole == User::USER_ROLE_SIMABLOG) {
                $user = $this->simablogUserService->createSimablogAccount($requestData);
            }else if ($userRole == User::USER_ROLE_LARACASTS) {
                $requestData['username'] = $data['username'];

                $user = $this->laracastsUserService->createSimablogAccount($requestData);
            }else if ($userRole == User::USER_ROLE_SIMPLENOTE){
                $user = $this->simplenoteUserService->createSimablogAccount($requestData);
            }else if ($userRole == User::USER_ROLE_ILUMUKITA){
                $user = $this->ilumukitaUserService->createSimablogAccount($requestData);
            }

            // Return the user object
            return $user;
        });
    }
}
