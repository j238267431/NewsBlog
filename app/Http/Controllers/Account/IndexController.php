<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UsersProfiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{

    protected function isUserGetProfile()
    {
        $idProfile = User::find(Auth::id())->getAttribute('id_profile');
        if (isset($idProfile)){
            return true;
        }
        return false;
    }

    protected function getCurrentDate()
    {
        return date("d.m.y");
    }

    public function index(){

        return view('account.index', [
            'categories' => $this->getCategoryList(),
            'user' => Auth::user(),
            'idProfileIsSet' => $this->isUserGetProfile(),
            'currentDate' => $this->getCurrentDate(),
        ]);
//        echo "Добро пожаловать - " . Auth::user()->name;
    }

}
