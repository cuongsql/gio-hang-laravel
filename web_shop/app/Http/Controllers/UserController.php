<?php
namespace App\Http\Controllers;

use App\Http\Repositories\User\UserRepositoryInterface;
use App\Http\Requests\CreateLoginValidate;
use App\Http\Requests\CreateRegisterValidate;
use App\Http\Services\User\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService, UserRepositoryInterface $userRepo) 
    {
        $this->userService = $userService;
        $this->userRepo = $userRepo;
    }
    
    public function index()
    {   
        $users = $this->userService->getAll();
        return view('admin.user.list', \compact('users'));
    }

    public function formRegister()
    {
        if(Auth::check()){
            return redirect()->route('index');
        }
        return view('register');
    }

    public function register(CreateRegisterValidate $request)
    {
        if(Auth::check()){
            return redirect()->route('index');
        }
        $this->userService->store($request);
        return redirect()->route('formLogin');
    }

    public function login(CreateLoginValidate $request)
    {
        if(Auth::check()){
            return redirect()->route('index');
        }
        if($this->userService->login($request)){
            return redirect()->route('index');
        }
        return back();
    }

    public function formLogin()
    {
        if(Auth::check()){
            return redirect()->route('index');
        }
        return view('login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('formLogin');
    }

    public function formEdit($id)
    {
        $user = $this->userRepo->findById($id);
        return view('admin.user.edit', \compact('user'));
    }

    public function update($id, Request $request)
    {
        $user = $this->userRepo->findById($id);
        $this->userService->update($user, $request);
        return redirect()->route('users.index');

    }

    public function destroy($id)
    {
        $this->userService->destroy($id);
        return back();
    }

}
