<?php

namespace App\Repositories\ServiceRepositoryPattern;

use App\Models\serviceRepositoryPattern\ServiceRepositoryPatternPost;
use App\Repositories\ServiceRepositoryPattern\PostRepositoryInterface;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;


class ServiceRepositoryPatternPostRepository implements PostRepositoryInterface
{
    protected $post;

    /**
     * UserRepository constructor.
     */
    public function __construct(
        ServiceRepositoryPatternPost $post
    ) {
        $this->post = $post;
    }

    public function getAll()
    {
        return $this->post->get();
    }

    public function getById($id)
    {
        return $this->post
            ->where('id', $id)
            ->get();
    }

    public function save($data)
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

    public function update($data, $id)
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

    public function delete($id)
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
