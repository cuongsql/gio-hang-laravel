<?php
namespace App\Http\Services\User;

use App\Http\Services\User\UserServiceInterface;
use App\Http\Repositories\User\UserRepositoryInterface;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceInterface
{
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo) {
        $this->userRepo = $userRepo;
    }

    public function getAll()
    {
        return $this->userRepo->getAll();
    }

    public function store($request)
    {
        $obj = new User();
        $obj->fill($request->all());
        $obj->password = Hash::make($request->password);
        $this->userRepo->store($obj);
    }
    
    public function login($request)
    {
        $data = $request->only('email', 'password');
        return $this->userRepo->login($data);
    }

    public function update($obj, $request)
    {
        $obj->username = $request->username;
        $obj->email = $request->email;
        $obj->password = Hash::make($request->password);
        $this->userRepo->store($obj);
    }

    public function destroy($id)
    {
        $user = $this->userRepo->findById($id);
        $this->userRepo->destroy($user);
    }

    public function findById($id)
    {
        return $this->userRepo->findById($id);
    }
}