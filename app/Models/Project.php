<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable=['title', 'content', 'slug','date_project'];
    use HasFactory;

    public static function generateSlug($title){
        return Str::slug($title, '-');
    }
}
