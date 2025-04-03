<?php

namespace App\Repositories\Auth;

use App\Models\User;
use App\Repositories\Auth\Interfaces\UserInterface;
use App\Repositories\BaseRepository;

use App\Services\Blogcrud\BlogcrudUserService;
use App\Services\Simablog\SimablogUserService;
use App\Services\Laracasts\LaracastsUserService;
use App\Services\Simplenote\SimplenoteUserService;
use App\Services\Ilumukita\IlumukitaUserService;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserInterface
{

    /**
     * @var User
     */
    protected $user;

    /**
     * IlumukitaUserRepository constructor.
     */
    public function __construct(
        User $user
    ) {
        $this->user = $user;
    }

    /**
     * Get all IlumukitaUserRepository function
     *
     * @return User|null
     */
    public function getAll(): ?User
    {
        return $this->user->get();
    }

    /**
     * Get one IlumukitaUserRepository function
     *
     * @param int $id
     * @return User|null
     */
    public function getById($id): ?User
    {
        return $this->user
            ->where('id', $id)
            ->get();
    }

    /**
     * Store IlumukitaUserRepository function
     *
     * @param array $data
     * @return User|null
     */
    public function save($data): User
    {
        DB::beginTransaction();
        try {      
            $user = $this->user->create($data);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('unable to update post data');
        }

        return $user;
    }

    /**
     * Update IlumukitaUserRepository function
     *
     * @param array $data
     * @param id $id
     * @return User|null
     */
    public function update($data, $id): ?User
    {
        DB::beginTransaction();
        try {            
            $user = $this->user->find($id);        
            $user->fill($data)->save();    
            DB::commit();
            
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('unable to update post data');
        }

        return $user;
    }

    /**
     * Delete IlumukitaUserRepository function
     *
     * @param id $id
     * @return User|null
     */
    public function delete($id): ?User
    {
        DB::beginTransaction();
        try {
            $user = $this->user->find($id);
            $user->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('unable to delete post data');
        }
        
        return $user;
    }

}
