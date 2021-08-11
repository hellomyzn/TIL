<?php

namespace App\Repositories\ServiceRepositoryPattern;

use App\Models\serviceRepositoryPattern\ServiceRepositoryPatternPost;
use App\Repositories\ServiceRepositoryPattern\PostRepositoryInterface;
use App\Repositories\BaseRepository;


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
        $post = $this->post->create([
            'title' => $data['title'],
            'description' => $data['description']
        ]);

        return $post->fresh();
    }

    public function update($data, $id)
    {
        $post = $this->post->find($id);
        $post->update([
            'title' => $data['title'],
            'description' => $data['description']
        ]);

        return $post;
    }

    public function delete($id)
    {
        $post = $this->post->find($id);
        $post->delete();

        return $post;
    }

}
