<?php


namespace App\Repositories;


use App\Models\User;
use App\Contracts\UserInterface;

/**
 * Class UserRepository
 * @package App\Repositories
 */
class UserRepository implements UserInterface
{
    /**
     * @var User
     */
    protected $model;

    /**
     * UserRepository constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function store($data)
    {
        return $this->model->create($data);
    }

    /**
     * @param $email
     * @return mixed
     */
    public function getByEmail($email)
    {
        return $this->model
            ->where('email', $email)
            ->first();
    }
}
