<?php

namespace App\Services\Blogcrud;

use App\Models\User;
use App\Models\simablog\SimablogUser;
use Illuminate\Support\Facades\DB;

/**
 * Class StudentService.
 */
class SimablogUserService
{
    /**
     * @var User
     */
    protected $user;

        /**
     * @var BlogcrudUser
     */
    protected $simablogUser;

    /**
     * StudentService constructor.
     *
     * @param BlogcrudUser         $blogcrud       blogcrud model
     * @param User                 $user           user model
     */
    public function __construct(
        SimablogUser $simablogUser,
        User $user
    ) {
        $this->simablogUser = $simablogUser;
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
    public function createSimablogAccount($requestData)
    {
        try {
            return DB::transaction(function () use ($requestData) {                
                // create or update on user side
                $userInstance = $this->user->create($requestData);
                $requestData['user_id'] = $userInstance->id;
                

                // create on student table
                $simablogUser = $this->simablogUser->create($requestData);

                return $userInstance;
            });
        } catch (\Exception $e) {
            // log error
            \Log::error(__METHOD__.'@'.$e->getLine().': '.$e->getMessage());

            throw new \Exception($e->getMessage());
        }
    }
}
