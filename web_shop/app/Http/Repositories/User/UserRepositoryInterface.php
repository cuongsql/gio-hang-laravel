<?php
namespace App\Http\Repositories\User;

use App\Http\Repositories\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function login($obj);


}