<?php

namespace App\Repositories\ServiceRepositoryPattern;

use App\Models\serviceRepositoryPattern\ServiceRepositoryPatternPost;
use App\Repositories\BaseRepository;


class ServiceRepositoryPatternPostRepository extends BaseRepository
{

    /**
     * UserRepository constructor.
     */
    public function __construct(
        ServiceRepositoryPatternPost $post
    ) {
        $this->post = $post;
    }

}
