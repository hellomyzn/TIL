<?php

namespace App\Repositories\Simablog;

use App\Models\simablog\SimablogUser;
use App\Repositories\Simablog\Interfaces\SimablogUserInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class SimablogUserRepository implements SimablogUserInterface
{
    /**
     * Undocumented variable
     *
     * @var SimablogUser
     */
    protected $simablogUser;


    /**
     * IlumukitaUserRepository constructor.
     */
    public function __construct(
        SimablogUser $simablogUser
    ) {
        $this->simablogUser = $simablogUser;
    }

    /**
     * Get all IlumukitaUserRepository function
     *
     * @return Collection|null
     */
    public function getAll(): ?Collection
    {
        return $this->simablogUser->get();
    }

    /**
     * Get one IlumukitaUserRepository function
     *
     * @param int $id
     * @return Collection|null
     */
    public function getById($id): ?Collection
    {
        return $this->simablogUser
            ->where('id', $id)
            ->get();
    }

    /**
     * Store IlumukitaUserRepository function
     *
     * @param array $data
     * @return SimablogUser|null
     */
    public function save($data): ?SimablogUser
    {
        DB::beginTransaction();
        try {      
            $simablogUser = $this->simablogUser->create($data);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('unable to update post data');
        }

        return $simablogUser;
    }

    /**
     * Update IlumukitaUserRepository function
     *
     * @param array $data
     * @param id $id
     * @return SimablogUser|null
     */
    public function update($data, $id): ?SimablogUser
    {
        DB::beginTransaction();
        try {            
            $simablogUser = $this->simablogUser->find($id);        
            $simablogUser->fill($data)->save();    
            DB::commit();
            
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('unable to update post data');
        }

        return $simablogUser;
    }

    /**
     * Delete IlumukitaUserRepository function
     *
     * @param id $id
     * @return SimablogUser|null
     */
    public function delete($id): ?SimablogUser
    {
        DB::beginTransaction();
        try {
            $simablogUser = $this->simablogUser->find($id);
            $simablogUser->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('unable to delete post data');
        }
        
        return $simablogUser;
    }

}
