<?php

namespace App\Repositories\Simplenote;

use App\Models\User;
use App\Repositories\BaseRepository;
use App\Models\simplenote\SimplenoteMemo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class SimplenoteMemoRepository extends BaseRepository
{

    /**
     * UserRepository constructor.
     */
    public function __construct(
        SimplenoteMemo $model
    ) {
        $this->model = $model;
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
            return $this->model::select('simplenote_memos.*')
                ->where('simplenote_user_id', $user_id)
                ->where('status', 1)->get();
        } else {
            $memos = $this->model::select('simplenote_memos.*')
                ->leftJoin('simplenote_tags', 'simplenote_tags.id', '=', 'simplenote_memos.simplenote_tag_id')
                ->where('simplenote_tags.name', $tag)
                ->where('simplenote_tags.simplenote_user_id', $user_id)
                ->where('status', 1)
                ->get();
            return $memos;
        }
    }
}
