<?php

namespace App\Services;

use App\Repositories\Interfaces\MemoInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class MemoService
{

    private MemoInterface $memoRepository;
    /**
     * UserRepository constructor.
     */
    public function __construct(
        MemoInterface $memoRepository
    ) {
        $this->memoRepository = $memoRepository;
    }

    /**
     * @throws \Exception
     * @throws \Throwable
     *
     * @return \Illuminate\Database\Eloquent\Model|mixed
     */
    public function myMemos($user_id)
    {
        $tag = \Request::query('tag');

        if (empty($tag))
        {
            return $this->memoRepository->getByUserIdAndStatus($user_id);
        } else {
            return $this->memoRepository->getByUserIdAndTagIdAndStatus($user_id, $tag);

        }
    }
}
