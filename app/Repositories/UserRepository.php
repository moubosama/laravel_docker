<?php

// app/Repositories/UserRepository.php
namespace App\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function find($id)
    {
        return User::find($id);
    }

    public function all()
    {
        return User::all();
    }
}
