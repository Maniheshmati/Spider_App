<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Post;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
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
        return redirect('/home');
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
        $data = $this->userRepository->show();
        $user = User::where('username', request('username'))->first();
        $posts = Post::all()->where('user_id', $user->id);
        return view('profile', ['user' => $user, 'posts' => $posts]);
        
    }

    public function index()
    {
        return $this->userRepository->index();
    }
    public function logout(){
        $this->userRepository->logout();
    }
    public function delete(Request $request){
        $response = $this->userRepository->delete($request->id);
        if($response == true){
            return redirect()->route('users');
        }
        
    }

}
