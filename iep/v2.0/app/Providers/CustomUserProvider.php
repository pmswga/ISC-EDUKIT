<?php

namespace App\Providers;

use App\IEPAccount;
use Carbon\Carbon;
use Illuminate\Auth\GenericUser;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;

class CustomUserProvider extends UserProvider
{
    
    /**
     * Retrieve a user by their unique identifier.
     *
     * @param  mixed $identifier
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveById($identifier)
    {
        $qry = IEPAccount::where('id_account','=',$identifier);

        if($qry->count() >0)
        {
            $user = $qry->select('id_account', 'second_name', 'first_name', 'patronymic', 'email', 'passwd')->first();

            $attributes = array(
                'id_account' => $user->admin_id,
                'second_name' => $user->second_name,
                'first_name' => $user->first_name,
                'patronymic' => $user->patronymic,
                'email' => $user->email,
                'passwd' => $user->passwd,
            );

            return $user;
        }

        return null;
    }

    
    /**
     * Retrieve a user by by their unique identifier and "remember me" token.
     *
     * @param  mixed $identifier
     * @param  string $token
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByToken($identifier, $token)
    {
        $qry = IEPAccount::where('id_account','=',$identifier)->where('remember_token','=',$token);

        if($qry->count() >0)
        {
            $user = $qry->select('id_account', 'second_name', 'first_name', 'patronymic', 'email', 'passwd')->first();

            $attributes = array(
                'id_account' => $user->admin_id,
                'second_name' => $user->second_name,
                'first_name' => $user->first_name,
                'patronymic' => $user->patronymic,
                'email' => $user->email,
                'passwd' => $user->passwd,
            );

            return $user;
        }

        return null;
    }


    /**
     * Update the "remember me" token for the given user in storage.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable $user
     * @param  string $token
     * @return void
     */
    public function updateRememberToken(Authenticatable $user, $token)
    {
        $user->setRememberToken($token);

        $user->save();
    }

    /**
     * Retrieve a user by the given credentials.
     *
     * @param  array $credentials
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        $qry = UserPoa::where('email','=',$credentials['email']);

        if($qry->count() >0)
        {
            $user = $qry->select('id_account', 'second_name', 'first_name', 'patronymic', 'email', 'passwd')->first();
            return $user;
        }

        return null;
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable $user
     * @param  array $credentials
     * @return bool
     */
    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        if(
            ($user->email == $credentials['email']) && 
            ($user->getAuthPassword() == bcrypt($credentials['passwd']))
        ) {

            $user->last_login_time = Carbon::now();
            $user->save();

            return true;
        }
        
        return false;
    }

}
