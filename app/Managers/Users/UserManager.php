<?php

namespace App\Managers\Users;

use App\Repositories\Users\UserRepository;
use Illuminate\Http\Request;

class UserManager
{
    private UserRepository $repository;

    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function create(Request $request)
    {
        return $this->repository->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
    }
}
