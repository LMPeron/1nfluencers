<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;

class UserService
{
    public function __construct(private UserRepository $userRepository)
    {
        //
    }

    public function storeUser(array $data): User
    {
        return $this->userRepository->create($data);
    }

    public function getByEmail(string $email): ?User
    {
        return $this->userRepository->get(['email' => $email]);
    }
}
