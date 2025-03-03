<?php 

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface{

    public function getAllUsers()
    {
        return User::all();

    }

    public function findUserById($id)
    {
        return User::find($id);
    }


}







?>