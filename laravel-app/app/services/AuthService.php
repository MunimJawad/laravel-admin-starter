<?php 

namespace App\Services;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class AuthService
{

public function registerUser(array $data): User
{
   $user = User::create([
    'name' => $data['name'],
    'email' => $data['email'],
    'password' => Hash::make($data['password'])
   ]);

  if (!empty($data['role'])) {
            $role = Role::where('name', $data['role'])->first();
            if ($role) {
                $user->roles()->attach($role->id);
            }
    }
    
   return $user;
}

}
