<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Services\AuthService;
use App\Http\Requests\RegisterUserRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{  
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
    $this->authService = $authService;
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(RegisterUserRequest $request)
    {
        $data = $request->validated();
        $user = $this->authService->registerUser($data);
        //return Redirect('test');
      ;
        Log::info('New user registered', ['user' => $user]);

        return $user;
    }

    
}
