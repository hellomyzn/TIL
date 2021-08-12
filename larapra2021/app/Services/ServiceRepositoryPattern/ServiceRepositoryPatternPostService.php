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
        // TODO: Use request
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
        // TODO: Use request
        $validator = Validator::make($data, [
            'title' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->error()->first());
        }

        $post = $this->postRepository->update($data, $id);

        return $post;

    }

    public function deleteByID($id)
    {
        $post = $this->postRepository->delete($id);
        return $post;
    }

}
