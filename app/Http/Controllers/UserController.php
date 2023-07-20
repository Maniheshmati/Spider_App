<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;


class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository){
        $this->userRepository = $userRepository;
    }
    public function createView()
    {
        return view("register");
    }

    public function create(RegisterRequest $request)
    {
        $this->userRepository->create($request);
    }

    public function loginView()
    {
        return view("login");
    }

    public function login(Request $request)
    {
        return $this->userRepository->login($request);
    }

    public function show()
    {
        return $this->userRepository->show();
    }

    public function index()
    {
        return $this->userRepository->index();
    }
    public function logout(){
        $this->userRepository->logout();
    }

}
