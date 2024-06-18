<?php

// app/Services/HogeService.php
namespace App\Services;

use App\Contracts\HogeInterface;
use App\Models\User;

class HogeService implements HogeInterface
{
    public function getHoge(): string
    {
        return 'hoge';
    }

    public function getAllUsers()
    {
        return User::all();
    }

    public function getUserById($id)
    {
        return User::find($id);
    }

    public function createUser(array $data)
    {
        return User::create($data);
    }
}
