<?php
namespace App\Http\Services\User;

use App\Http\Services\ServiceInterface;

interface UserServiceInterface extends ServiceInterface
{
    public function login($request);
    
}