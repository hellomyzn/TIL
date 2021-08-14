<?php

namespace App\Repositories\Ilumukita;

use App\Models\User;
use App\Models\ilumukita\IlumukitaUser;
use App\Repositories\Ilumukita\Interfaces\IlumukitaUserInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class IlumukitaUserRepository implements IlumukitaUserInterface
{
    /**
     * Undocumented variable
     *
     * @var IlumukitaUser
     */
    protected $ilumukitaUser;

    /**
     * @var User
     */
    protected $user;

    /**
     * IlumukitaUserRepository constructor.
     */
    public function __construct(
        IlumukitaUser $ilumukitaUser,
        User $user
    ) {
        $this->ilumukitaUser = $ilumukitaUser;
        $this->user = $user;
    }

    /**
     * Get all IlumukitaUserRepository function
     *
     * @return IlumukitaUser|null
     */
    public function getAll(): ?IlumukitaUser
    {
        return $this->ilumukitaUser->get();
    }

    /**
     * Get one IlumukitaUserRepository function
     *
     * @param int $id
     * @return IlumukitaUser|null
     */
    public function getById($id): ?IlumukitaUser
    {
        return $this->ilumukitaUser
            ->where('id', $id)
            ->get();
    }

    /**
     * Store IlumukitaUserRepository function
     *
     * @param array $data
     * @return IlumukitaUser|null
     */
    public function save($data): ?IlumukitaUser
    {
        DB::beginTransaction();
        try {      
            $ilumukitaUser = $this->ilumukitaUser->create($data);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('unable to update post data');
        }

        return $ilumukitaUser;
    }

    /**
     * Update IlumukitaUserRepository function
     *
     * @param array $data
     * @param id $id
     * @return IlumukitaUser|null
     */
    public function update($data, $id): ?IlumukitaUser
    {
        DB::beginTransaction();
        try {            
            $ilumukitaUser = $this->ilumukitaUser->find($id);        
            $ilumukitaUser->fill($data)->save();    
            DB::commit();
            
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('unable to update post data');
        }

        return $ilumukitaUser;
    }

    /**
     * Delete IlumukitaUserRepository function
     *
     * @param id $id
     * @return IlumukitaUser|null
     */
    public function delete($id): ?IlumukitaUser
    {
        DB::beginTransaction();
        try {
            $ilumukitaUser = $this->ilumukitaUser->find($id);
            $ilumukitaUser->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('unable to delete post data');
        }
        
        return $ilumukitaUser;
    }

}
