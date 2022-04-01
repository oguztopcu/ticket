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

    /**
     * Yeni kullanıcı oluşturur.
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data = []): User
    {
        return $this->model->create($data);
    }
}
