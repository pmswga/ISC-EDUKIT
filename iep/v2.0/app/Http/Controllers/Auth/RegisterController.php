<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/student';

    public function __construct()
    {
        $this->middleware('guest');
    }
    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'second_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'patronymic' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'passwd' => 'required|string|min:6|confirmed',
        ]);
    }

    
    protected function create(array $data)
    {
        return User::create([
            'second_name'  => $data['second_name'],
            'first_name'   => $data['first_name'],
            'patronymic'   => $data['patronymic'],
            'email'        => $data['email'],
            'passwd'     => bcrypt($data['password']),
            'id_type_user' => 3
        ]);
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

}
