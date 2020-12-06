<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParsedNews extends Model
{
    use HasFactory;
    protected $table = 'parsedNews';
    protected $fillable = ['title','link','guid','description','image','pubDate','slug'];
    protected $primaryKey = 'id';
//    protected $guarded =[];
    public $timestamps = false;
}
