<?php

namespace App\Services\Blogcrud;

use App\Models\User;
use App\Models\blogcrud\BlogcrudUser;
use Illuminate\Support\Facades\DB;

/**
 * Class StudentService.
 */
class BlogcrudUserService
{
    /**
     * @var User
     */
    protected $user;

        /**
     * @var BlogcrudUser
     */
    protected $blogcrud;

    /**
     * StudentService constructor.
     *
     * @param BlogcrudUser         $blogcrud       blogcrud model
     * @param User                 $user           user model
     */
    public function __construct(
        BlogcrudUser $blogcrud,
        User $user
    ) {
        $this->blogcrud = $blogcrud;
        $this->user = $user;
    }

    /**
     * Create student and user.
     *
     * @param array $requestData
     *
     * @return array
     * @return array on error
     */
    public function createBlogcrudAccount($requestData)
    {
        try {
            return DB::transaction(function () use ($requestData) {                
                // create or update on user side
                $userInstance = $this->user->create($requestData);
                $requestData['user_id'] = $userInstance->id;
                

                // create on student table
                $blogcrudUser = $this->blogcrud->create($requestData);

                return $userInstance;
            });
        } catch (\Exception $e) {
            // log error
            \Log::error(__METHOD__.'@'.$e->getLine().': '.$e->getMessage());

            throw new \Exception($e->getMessage());
        }
    }
}
