<?php

namespace App\Repositories\Simplenote;

use App\Models\simplenote\SimplenoteUser;
use App\Repositories\Simplenote\Interfaces\SimplenoteUserInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class SimplenoteUserRepository implements SimplenoteUserInterface
{
    /**
     * Undocumented variable
     *
     * @var SimplenoteUser
     */
    protected $simplenoteUser;


    /**
     * IlumukitaUserRepository constructor.
     */
    public function __construct(
        SimplenoteUser $simplenoteUser
    ) {
        $this->simplenoteUser = $simplenoteUser;
    }

    /**
     * Get all IlumukitaUserRepository function
     *
     * @return Collection|null
     */
    public function getAll(): ?Collection
    {
        return $this->simplenoteUser->get();
    }

    /**
     * Get one IlumukitaUserRepository function
     *
     * @param int $id
     * @return Collection|null
     */
    public function getById($id): ?Collection
    {
        return $this->simplenoteUser
            ->where('id', $id)
            ->get();
    }

    /**
     * Store IlumukitaUserRepository function
     *
     * @param array $data
     * @return SimplenoteUser|null
     */
    public function save($data): ?SimplenoteUser
    {
        DB::beginTransaction();
        try {      
            $simplenoteUser = $this->simplenoteUser->create($data);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('unable to update post data');
        }

        return $simplenoteUser;
    }

    /**
     * Update IlumukitaUserRepository function
     *
     * @param array $data
     * @param id $id
     * @return SimplenoteUser|null
     */
    public function update($data, $id): ?SimplenoteUser
    {
        DB::beginTransaction();
        try {            
            $simplenoteUser = $this->simplenoteUser->find($id);        
            $simplenoteUser->fill($data)->save();    
            DB::commit();
            
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('unable to update post data');
        }

        return $simplenoteUser;
    }

    /**
     * Delete IlumukitaUserRepository function
     *
     * @param id $id
     * @return SimplenoteUser|null
     */
    public function delete($id): ?SimplenoteUser
    {
        DB::beginTransaction();
        try {
            $simplenoteUser = $this->simplenoteUser->find($id);
            $simplenoteUser->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('unable to delete post data');
        }
        
        return $simplenoteUser;
    }

}
