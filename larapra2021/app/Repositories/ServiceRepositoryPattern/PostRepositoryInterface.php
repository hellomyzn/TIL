<?php

namespace App\Repositories\ServiceRepositoryPattern;

interface PostRepositoryInterface
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function getAll();

    /**
     * Undocumented function
     *
     * @param int $id
     * @return void
     */
    public function getById(int $id);

    /**
     * Undocumented function
     *
     * @param array $data
     * @return void
     */
    public function save(array $data);

    /**
     * Undocumented function
     *
     * @param array $data
     * @param int $id
     * @return void
     */
    public function update(array $data, int $id);

    /**
     * Undocumented function
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id);
}