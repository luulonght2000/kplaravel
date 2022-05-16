<?php

namespace App\Exceptions;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class UserImport implements ToModel
{
    public function model(array $row)
    {
        return new User([
            'name' => $row['name'],
            'email' => $row['email'],
            'password' => Hash::make($row['password']),
        ]);
    }
}
