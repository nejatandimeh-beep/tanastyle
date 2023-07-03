<?php

namespace App;

use App\Notifications\CustomResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Session;

class Seller extends Authenticatable
{
    use Notifiable;

    protected $table = 'sellers';


    protected $fillable = [
        'name','email', 'password','Family','NationalID',
        'Birthday','Gender','Phone','Mobile','State','City',
        'Address','ShopNumber','HomeAddress','HomePostalCode',
        'WorkPostalCode','PicPath','Signature','PicPathCard','status'
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];


    public function getAuthPassword()
    {
        return $this->password;
    }

    public function sendPasswordResetNotification($token)
    {
        // Your your own implementation.
        $this->notify(new CustomResetPasswordNotification($token));
    }

    public function validateToken($token)
    {
        $validToken = Session::get('token');
        if ($token == $validToken) {
            return true;

        } else {
            return false;
        }
    }
}
