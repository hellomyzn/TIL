<?php

namespace App\Services\ServiceRepositoryPattern;

use App\Repositories\ServiceRepositoryPattern\PostRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

/**
 * Class StudentService.
 */
class ServiceRepositoryPatternPostService
{

    /**
     * @var PostRepositoryInterface
     */
    protected $postRepository;

    /**
     * StudentService constructor.
     *
     * @param PostRepositoryInterface                       
     */
    public function __construct(
        PostRepositoryInterface $postRepository
    ) {
        $this->postRepository = $postRepository;
    }

    public function getAll()
    {
        return $this->postRepository->getAll();
    }

    public function savePostData($data)
    {
        $validator = Validator::make($data, [
            'title' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->error()->first());
        }

        $result = $this->postRepository->save($data);

        return $result;
    }

    public function getById($id)
    {
        return $this->postRepository->getById($id);
    }

    public function updatePostData($data, $id)
    {
        $validator = Validator::make($data, [
            'title' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->error()->first());
        }

        DB::beginTransaction();

        try {
            $post = $this->postRepository->update($data, $id);
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('unable to update post data');
        }

        DB::commit();

        return $post;

    }

    public function deleteByID($id)
    {
        DB::beginTransaction();

        try {
            $post = $this->postRepository->delete($id);
        } catch (Exception $e) {
            DB::rollback();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('unable to delete post data');
        }

        DB::commit();

        return $post;
    }

}
