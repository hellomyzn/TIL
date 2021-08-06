<?php

namespace App\Repositories\Auth;

use App\Models\User;
use App\Repositories\BaseRepository;
use App\Services\Blogcrud\BlogcrudUserService;
use Illuminate\Support\Facades\DB;

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
                'password' => $data['password'] ?? '',
            ];

            // create user data by role
            if ($userRole == User::USER_ROLE_BLOGCRUD) {
                $user = $this->blogcrudUserService->createBlogcrudAccount($requestData);
            }

            // Return the user object
            return $user;
        });
    }
}
