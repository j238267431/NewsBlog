<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepliesComments extends Model
{
    use HasFactory;
    public $fillable = ['body', 'to_comment_id'];
    public $table = 'replies';
}
