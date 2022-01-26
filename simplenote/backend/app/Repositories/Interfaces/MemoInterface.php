<?php

namespace App\Repositories\Interfaces;

interface MemoInterface
{
    /**
     * Undocumented function
     *
     * @return Collection|null
     */
    public function getAll();

    /**
     * Undocumented function
     *
     * @param int $id
     * @return Collection|null
     */
    public function getById(int $id);

    /**
     * Undocumented function
     *
     * @param array $data
     * @return void|null
     */
    public function save(array $data);

    /**
     * Undocumented function
     *
     * @param array $data
     * @param int $id
     * @return void|null
     */
    public function update(array $data, int $id);

    /**
     * Undocumented function
     *
     * @param int $id
     * @return void|null
     */
    public function delete(int $id);
}