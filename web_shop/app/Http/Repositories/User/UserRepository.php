<?php
namespace App\Http\Repositories\User;

use App\Http\Repositories\User\UserRepositoryInterface;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserRepositoryInterface
{
    protected $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function getAll()
    {
        return $this->user->all();
    }

    public function store($obj)
    {
        $obj->save();
    }

    public function login($obj)
    { 
        return Auth::attempt($obj);
    }


    public function destroy($obj)
    {
        $obj->delete();
    }

    public function findById($id)
    {
        return $this->user->findOrFail($id);
    }
}