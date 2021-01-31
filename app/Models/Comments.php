<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = ['news_id', 'body', 'created_at', 'updated_at', 'user_id', 'user_name', 'to_comment_id'];
}
