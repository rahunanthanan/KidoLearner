<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
//use Illuminate\Contracts\Auth\CanResetPassword;
//use Illuminate\Database\Eloquent\Model;
//use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable,CanResetPassword;

    protected $table = 'user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'UserName', 'Password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }
    public function getAuthPassword() {
        return $this->Password;
    }

    public static $rules = array(


        'name' => 'required',
        'email' => 'required|email|unique:user',
        'password' => 'required|alphaNum|min:3',
        'ConfirmPassword' => 'required|min:3|same:password'
    );
}
