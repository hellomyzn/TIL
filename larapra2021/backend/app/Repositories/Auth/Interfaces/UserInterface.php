<?php

namespace App\Repositories\Auth\Interfaces;

interface UserInterface
{
    /**
     * Get all user data function
     *
     * @return void|null
     */
    public function getAll();

    /**
     * Get specific user data function
     *
     * @param int $id
     * @return void|null
     */
    public function getById(int $id);

    /**
     * Store specific user function
     *
     * @param array $data
     * @return void|null
     */
    public function save(array $data);

    /**
     * Update specific user function
     *
     * @param array $data
     * @param int $id
     * @return void|null
     */
    public function update(array $data, int $id);

    /**
     * Delete specific user function
     *
     * @param int $id
     * @return void|null
     */
    public function delete(int $id);
}