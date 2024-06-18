<?php

// app/Repositories/UserRepositoryInterface.php
namespace App\Repositories;

interface UserRepositoryInterface
{
    public function find($id);
    public function all();
}
