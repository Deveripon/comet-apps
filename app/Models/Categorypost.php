<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorypost extends Model
{
    use HasFactory;
    protected $guarded = [];

    //define many to many relationship to post model
    public function post()
    {
        return $this -> belongsToMany(Post::class);
    }
}
