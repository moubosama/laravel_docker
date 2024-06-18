<?php

// app/Contracts/HogeInterface.php
namespace App\Contracts;

interface HogeInterface
{
    public function getHoge(): string;

    public function getAllUsers();
    public function getUserById($id);
    public function createUser(array $data);
}
