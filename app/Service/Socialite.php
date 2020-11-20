<?php


namespace App\Service;


use App\Models\User;

class Socialite
{
    public function saveUser($user)
    {
        $email = $user->getEmail();
        $name = $user->getName();
        $model = User::where('email', $email)->first();
            if($model){
               $user = $model->saveSocialUser(['email' => $email, 'name' => $name]);
               if($user) {
                   \Auth::loginUsingId($model->id);
               }
            }
            return true;
    }
}
