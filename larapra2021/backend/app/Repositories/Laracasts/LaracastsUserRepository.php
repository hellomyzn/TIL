<?php

namespace App\Repositories\Laracasts;

use App\Models\laracasts\LaracastsUser;
use App\Repositories\Laracasts\Interfaces\LaracastsUserInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class LaracastsUserRepository implements LaracastsUserInterface
{
    /**
     * Undocumented variable
     *
     * @var LaracastsUser
     */
    protected $laracastsUser;


    /**
     * IlumukitaUserRepository constructor.
     */
    public function __construct(
        LaracastsUser $laracastsUser
    ) {
        $this->laracastsUser = $laracastsUser;
    }

    /**
     * Get all IlumukitaUserRepository function
     *
     * @return Collection|null
     */
    public function getAll(): ?Collection
    {
        return $this->laracastsUser->get();
    }

    /**
     * Get one IlumukitaUserRepository function
     *
     * @param int $id
     * @return Collection|null
     */
    public function getById($id): ?Collection
    {
        return $this->laracastsUser
            ->where('id', $id)
            ->get();
    }

    /**
     * Store IlumukitaUserRepository function
     *
     * @param array $data
     * @return LaracastsUser|null
     */
    public function save($data): ?LaracastsUser
    {
        DB::beginTransaction();
        try {      
            $laracastsUser = $this->laracastsUser->create($data);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('unable to update post data');
        }

        return $laracastsUser;
    }

    /**
     * Update IlumukitaUserRepository function
     *
     * @param array $data
     * @param id $id
     * @return LaracastsUser|null
     */
    public function update($data, $id): ?LaracastsUser
    {
        DB::beginTransaction();
        try {            
            $laracastsUser = $this->laracastsUser->find($id);        
            $laracastsUser->fill($data)->save();    
            DB::commit();
            
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('unable to update post data');
        }

        return $laracastsUser;
    }

    /**
     * Delete IlumukitaUserRepository function
     *
     * @param id $id
     * @return LaracastsUser|null
     */
    public function delete($id): ?LaracastsUser
    {
        DB::beginTransaction();
        try {
            $laracastsUser = $this->laracastsUser->find($id);
            $laracastsUser->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('unable to delete post data');
        }
        
        return $laracastsUser;
    }

}
