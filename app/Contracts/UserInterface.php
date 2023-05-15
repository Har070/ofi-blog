<?php


namespace App\Contracts;


/**
 * Interface UserInterface
 * @package App\Contracts\User
 */
interface UserInterface
{
    /**
     * @param $data
     * @return mixed
     */
    public function store($data);

    /**
     * @param $email
     * @return mixed
     */
    public function getByEmail($email);
}
