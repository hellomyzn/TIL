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
    public function getById($id);

    /**
     * Undocumented function
     *
     * @param array $data
     * @return void
     */
    public function save($data);

    /**
     * Undocumented function
     *
     * @param array $data
     * @param int $id
     * @return void
     */
    public function update($data, $id);

    /**
     * Undocumented function
     *
     * @param int $id
     * @return void
     */
    public function delete($id);
}