<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileCreate;
use App\Http\Requests\ProfileUpdate;
use App\Models\News;
use App\Models\User;
use App\Models\UsersProfiles;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->getCategoryList();
        $user = \Auth::user();
        return view('profiles.create', [
            'categories' => $categories,
            'user' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileCreate $request)
    {
//        dd($request);
        if($request->has('image')){
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $data['image'] = $file->storeAs('profiles', $fileName, 'uploads');
        }
        $data = $request->only(['day_of_birth', 'image']);
        $idProfile = UsersProfiles::insertGetId($data);
        $userId = \Auth::id();
        User::find($userId)->update([
           'id_profile' => $idProfile
        ]);
        return redirect()->route('account');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UsersProfiles  $usersProfiles
     * @return \Illuminate\Http\Response
     */
    public function show(UsersProfiles $usersProfiles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UsersProfiles  $usersProfiles
     * @return \Illuminate\Http\Response
     */


    public function edit(UsersProfiles $usersProfiles)
    {
//        $profile = User::find(\Auth::id())->profiles;
        return view('profiles.edit', [
            'categories' => $this->getCategoryList(),
            'profile' => $usersProfiles,
            'today' => date('Y-m-d'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UsersProfiles  $usersProfiles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UsersProfiles $usersProfiles)
    {
        $user_id = \Auth::id();
        $data = $request->only(['day_of_birth', 'image']);
        if($request->has('image')){
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $data['image'] = $file->storeAs('profiles/'.$user_id, $fileName, 'uploads');

        }

        $id = $usersProfiles->getAttribute('id');
        $row = UsersProfiles::find($id);
        $row->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UsersProfiles  $usersProfiles
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsersProfiles $usersProfiles)
    {
        //
    }
}
