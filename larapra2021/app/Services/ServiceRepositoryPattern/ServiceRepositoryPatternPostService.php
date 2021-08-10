<?php

namespace App\Services\ServiceRepositoryPatternPostService;

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

}
