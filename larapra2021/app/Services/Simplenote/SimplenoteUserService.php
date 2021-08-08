<?php

namespace App\Services\Simplenote;

use App\Models\User;
use App\Models\simplenote\SimplenoteUser;
use Illuminate\Support\Facades\DB;

/**
 * Class StudentService.
 */
class SimplenoteUserService
{
    /**
     * @var User
     */
    protected $user;

        /**
     * @var SimplenoteUser
     */
    protected $simplenoteUser;

    /**
     * StudentService constructor.
     *
     * @param SimplenoteUser
     * @param User
     */
    public function __construct(
        SimplenoteUser $simplenoteUser,
        User $user
    ) {
        $this->simplenoteUser = $simplenoteUser;
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
    public function createSimplenoteAccount($requestData)
    {
        try {
            return DB::transaction(function () use ($requestData) {                
                // create or update on user side
                $userInstance = $this->user->create($requestData);
                $requestData['user_id'] = $userInstance->id;
                

                // create on student table
                $simplenoteUser = $this->simplenoteUser->create($requestData);

                return $userInstance;
            });
        } catch (\Exception $e) {
            // log error
            \Log::error(__METHOD__.'@'.$e->getLine().': '.$e->getMessage());

            throw new \Exception($e->getMessage());
        }
    }
}
