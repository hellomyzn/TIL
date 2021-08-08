<?php

namespace App\Services\Laracasts;

use App\Models\User;
use App\Models\Laracasts\LaracastsUser;
use Illuminate\Support\Facades\DB;

/**
 * Class StudentService.
 */
class LaracastsUserService
{
    /**
     * @var User
     */
    protected $user;

        /**
     * @var LaracastsUser
     */
    protected $laracastsUser;

    /**
     * StudentService constructor.
     *
     * @param LaracastsUser         
     * @param User                 
     */
    public function __construct(
        LaracastsUser $laracastsUser,
        User $user
    ) {
        $this->laracastsUser = $laracastsUser;
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
    public function createLaracastsAccount($requestData)
    {
        try {
            return DB::transaction(function () use ($requestData) {                
                // create or update on user side
                $userInstance = $this->user->create($requestData);
                $requestData['user_id'] = $userInstance->id;
                
                // create on student table
                $laracastsUser = $this->laracastsUser->create($requestData);

                return $userInstance;
            });
        } catch (\Exception $e) {
            // log error
            \Log::error(__METHOD__.'@'.$e->getLine().': '.$e->getMessage());

            throw new \Exception($e->getMessage());
        }
    }
}
