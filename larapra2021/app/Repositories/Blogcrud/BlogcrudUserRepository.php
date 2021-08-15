<?php

namespace App\Repositories\Blogcrud;

use App\Models\blogcrud\BlogcrudUser;
use App\Repositories\Blogcrud\Interfaces\BlogcrudUserInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class BlogcrudUserRepository implements BlogcrudUserInterface
{
    /**
     * variable
     *
     * @var BlogcrudUser
     */
    protected $blogcrudUser;


    /**
     * constructor.
     */
    public function __construct(
        BlogcrudUser $blogcrudUser
    ) {
        $this->blogcrudUser = $blogcrudUser;
    }

    /**
     * Get all function
     *
     * @return Collection|null
     */
    public function getAll(): ?Collection
    {
        return $this->blogcrudUser->get();
    }

    /**
     * Get one function
     *
     * @param int $id
     * @return Collection|null
     */
    public function getById($id): ?Collection
    {
        return $this->blogcrudUser
            ->where('id', $id)
            ->get();
    }

    /**
     * Store function
     *
     * @param array $data
     * @return BlogcrudUser|null
     */
    public function save($data): ?BlogcrudUser
    {
        DB::beginTransaction();
        try {      
            $blogcrudUser = $this->blogcrudUser->create($data);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('unable to update post data');
        }

        return $blogcrudUser;
    }

    /**
     * Update function
     *
     * @param array $data
     * @param id $id
     * @return BlogcrudUser|null
     */
    public function update($data, $id): ?BlogcrudUser
    {
        DB::beginTransaction();
        try {            
            $blogcrudUser = $this->blogcrudUser->find($id);        
            $blogcrudUser->fill($data)->save();    
            DB::commit();
            
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('unable to update post data');
        }

        return $blogcrudUser;
    }

    /**
     * Delete function
     *
     * @param id $id
     * @return BlogcrudUser|null
     */
    public function delete($id): ?BlogcrudUser
    {
        DB::beginTransaction();
        try {
            $blogcrudUser = $this->blogcrudUser->find($id);
            $blogcrudUser->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('unable to delete post data');
        }
        
        return $blogcrudUser;
    }

}
