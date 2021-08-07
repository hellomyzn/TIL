<?php

namespace App\Repositories\Auth;

use App\Models\User;
use App\Repositories\BaseRepository;
use App\Services\Blogcrud\BlogcrudUserService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserRepository extends BaseRepository
{
    /**
     * @var
     */
    protected $blogcrudUserService;

    /**
     * UserRepository constructor.
     */
    public function __construct(User $model, BlogcrudUserService $blogcrudUserService)
    {
        $this->model = $model;
        $this->blogcrudUserService = $blogcrudUserService;
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
                $user = $this->blogcrudUserService->createBlogcrudAccount($requestData);
            }

            // Return the user object
            return $user;
        });
    }
}
