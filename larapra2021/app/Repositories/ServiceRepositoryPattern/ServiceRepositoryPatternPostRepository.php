<?php

namespace App\Repositories\ServiceRepositoryPattern;

use App\Models\serviceRepositoryPattern\ServiceRepositoryPatternPost;
use App\Repositories\ServiceRepositoryPattern\PostRepositoryInterface;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class ServiceRepositoryPatternPostRepository implements PostRepositoryInterface
{
    protected $post;

    /**
     * ServiceRepositoryPatternPostRepository constructor.
     */
    public function __construct(
        ServiceRepositoryPatternPost $post
    ) {
        $this->post = $post;
    }

    /**
     * Get all ServiceRepositoryPatternPost function
     *
     * @return Collection|null
     */
    public function getAll(): ?Collection
    {
        return $this->post->get();
    }

    /**
     * Get one ServiceRepositoryPatternPost function
     *
     * @param int $id
     * @return Collection|null
     */
    public function getById($id): ?Collection
    {
        // dd($this->post
        // ->where('id', $id)
        // ->get());
        return $this->post
            ->where('id', $id)
            ->get();
    }

    /**
     * Store ServiceRepositoryPatternPost function
     *
     * @param array $data
     * @return Collection|null
     */
    public function save($data): ?Collection
    {
        DB::beginTransaction();
        try {      
            $post = $this->post->create($data);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('unable to update post data');
        }

        return $post;
    }

    /**
     * Update ServiceRepositoryPatternPost function
     *
     * @param array $data
     * @param id $id
     * @return Collection|null
     */
    public function update($data, $id): ?Collection
    {
        DB::beginTransaction();
        try {            
            $post = $this->post->find($id);        
            $post->fill($data)->save();    
            DB::commit();
            
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('unable to update post data');
        }

        return $post;
    }

    /**
     * Delete ServiceRepositoryPatternPost function
     *
     * @param id $id
     * @return Collection|null
     */
    public function delete($id): ?Collection
    {
        DB::beginTransaction();
        try {
            $post = $this->post->find($id);
            $post->delete();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('unable to delete post data');
        }
        
        return $post;
    }

}
