<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdate;
use App\Models\User;
use App\Models\UsersProfiles;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        return date('Y-m-d');
    }

    public function index(){

        if(!$this->isUserGetProfile()){
            $data = UsersProfiles::create([
                'image' => 'empty',
                'city_of_origin' => 'empty',
                'day_of_birth' => '1900-01-01',]);
            User::find(Auth::id())->update([
               'id_profile' => $data['id'],
            ]);
        }
        $profile = User::find(Auth::id())->profiles;
        return view('account.index', [
            'categories' => $this->getCategoryList(),
            'user' => Auth::user(),
            'idProfileIsSet' => $this->isUserGetProfile(),
            'currentDate' => $this->getCurrentDate(),
            'profile' => $profile
        ]);
//        echo "Добро пожаловать - " . Auth::user()->name;
    }

    public function accountUpdate(ProfileUpdate $request)
    {

        $profile = UsersProfiles::find(Auth::user()->id_profile);
        $profile->update([
            'city_of_origin' => $request->city_of_origin,
            'day_of_birth' => $request->day_of_birth,
        ]);
        $user = User::find(Auth::id());
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return back()->with('success', 'изменения сохранены');
    }

    public function imageChange(Request $request, UsersProfiles $usersProfiles)
    {
//        \Storage::disk('uploads')->delete('profiles/4/volki-zhivotnye-82.jpg');
        $url = \Storage::disk('uploads')->url('profiles/4/volki-zhivotnye-82.jpg');
        $user_id = \Auth::id();
        $profileId = Auth::user()->id_profile;
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
        $row = UsersProfiles::find($profileId);
        $row->update([
            'image' => $file->storeAs('profiles/'.$user_id, $fileName, 'uploads')
        ]);
        return back();
    }

    public function profileCreate()
    {

    }
}
