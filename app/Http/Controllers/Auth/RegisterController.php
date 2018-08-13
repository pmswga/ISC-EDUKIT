<?php

namespace App\Http\Controllers\Auth;

use App\IEPAccount;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:iepaccount',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
    
    protected function create(array $data)
    {
        return IEPAccount::create([
            'second_name'     => $data['second_name'],
            'first_name'      => $data['first_name'],
            'patronymic'      => $data['patronymic'],
            'email'           => $data['email'],
            'password'        => bcrypt($data['password']),
            'id_account_type' => $data['account'],
        ]);
    }
}
