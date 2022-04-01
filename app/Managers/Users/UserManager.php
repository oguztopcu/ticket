<?php

namespace App\Managers\Users;

use App\Models\User;
use App\Repositories\Users\UserRepository;
use Illuminate\Http\Request;

class UserManager
{
    private UserRepository $repository;

    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    /**
     * Kullanıcı oluşturur.
     *
     * @param Request $request
     * @return User
     */
    public function create(Request $request): User
    {
        return $this->repository->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
    }
}
