<?php

namespace App\Repositories;

use App\Models\Memo;
use App\Repositories\Interfaces\MemoInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class MemoRepository implements MemoInterface
{
    /**
     * Undocumented variable
     *
     * @var Memo
     */
    protected $memo;


    /**
     * IlumukitaUserRepository constructor.
     */
    public function __construct(
        Memo $memo
    ) {
        $this->memo = $memo;
    }

    /**
     * Get all IlumukitaUserRepository function
     *
     * @return Collection|null
     */
    public function getAll(): ?Collection
    {
        return $this->memo->get();
    }

    /**
     * Get one IlumukitaUserRepository function
     *
     * @param int $id
     * @return Collection|null
     */
    public function getById($id): ?Collection
    {
        return $this->memo
            ->where('id', $id)
            ->get();
    }

    /**
     * Store IlumukitaUserRepository function
     *
     * @param array $data
     * @return Memo|null
     */
    public function save($data): ?Memo
    {
        DB::beginTransaction();
        try {      
            $memo = $this->memo->create($data);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('unable to update post data');
        }

        return $memo;
    }

    /**
     * Update IlumukitaUserRepository function
     *
     * @param array $data
     * @param id $id
     * @return Memo|null
     */
    public function update($data, $id): ?Memo
    {
        DB::beginTransaction();
        try {            
            $memo = $this->memo->find($id);        
            $memo->fill($data)->save();    
            DB::commit();
            
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('unable to update post data');
        }

        return $memo;
    }

    /**
     * Delete IlumukitaUserRepository function
     *
     * @param id $id
     * @return Memo|null
     */
    public function delete($id): ?Memo
    {
        DB::beginTransaction();
        try {
            $memo = $this->memo->find($id);
            $memo->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('unable to delete post data');
        }
        
        return $memo;
    }

    public function getByUserIdAndStatus($user_id): ?Collection
    {
        return $this->memo
            ->where('user_id', $user_id)
            ->where('status', 1)
            ->get();
    }

    public function getByUserIdAndTagIdAndStatus($user_id, $tag): ?Collection
    {
        $memos = $this->memo
            ->leftJoin('tags', 'tags.id', '=', 'memos.tag_id')
            ->where('tags.name', $tag)
            ->where('tags.user_id', $user_id)
            ->where('status', 1)
            ->get();
            return $memos;
    }



}
