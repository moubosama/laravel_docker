<?php

// app/Services/UserService.php
namespace App\Services;

use App\Repositories\UserRepositoryInterface;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUserById($id)
    {
        return $this->userRepository->find($id);
    }

    public function getAllUsers()
    {
        return $this->userRepository->all();
    }
}
