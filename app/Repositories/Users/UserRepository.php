<?php

namespace App\Repositories\Users;

use App\Models\User;

class UserRepository
{
    private User $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function create(array $data = [])
    {
        return $this->model->create($data);
    }
}
