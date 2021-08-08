<?php

namespace App\Services\Ilumukita;

use App\Models\User;
use App\Models\ilumukita\IlumukitaUser;
use Illuminate\Support\Facades\DB;

/**
 * Class StudentService.
 */
class IlumukitaUserService
{
    /**
     * @var User
     */
    protected $user;

        /**
     * @var IlumukitaUser
     */
    protected $ilumukitaUser;

    /**
     * StudentService constructor.
     *
     * @param IlumukitaUser
     * @param User
     */
    public function __construct(
        IlumukitaUser $ilumukitaUser,
        User $user
    ) {
        $this->ilumukitaUser = $ilumukitaUser;
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
                $simplenoteUser = $this->IlumukitaUser->create($requestData);

                return $userInstance;
            });
        } catch (\Exception $e) {
            // log error
            \Log::error(__METHOD__.'@'.$e->getLine().': '.$e->getMessage());

            throw new \Exception($e->getMessage());
        }
    }
}
