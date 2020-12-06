<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersProfiles extends Model
{
    use HasFactory;
    protected $table = 'users_profiles';
    protected $fillable = ['day_of_birth', 'image', 'city_of_origin', 'sex', 'email'];
    public $timestamps = false;

}
