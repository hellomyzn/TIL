<?php

namespace App\Services\ServiceRepositoryPattern;

use App\Repositories\ServiceRepositoryPattern\ServiceRepositoryPatternPostRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

/**
 * Class StudentService.
 */
class ServiceRepositoryPatternPostService
{

    /**
     * @var ServiceRepositoryPatternPostRepository
     */
    protected $postRepository;

    /**
     * StudentService constructor.
     *
     * @param ServiceRepositoryPatternPostRepository                       
     */
    public function __construct(
        ServiceRepositoryPatternPostRepository $postRepository
    ) {
        $this->postRepository = $postRepository;
    }

    public function getAll()
    {
        return $this->postRepository->getAllPost();
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

}
