<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    //relationship with post category model
    public function category()
    {
        return $this->belongsToMany(Categorypost::class);
    }

      //relationship with post tag model
    public function tag()
    {
       return $this -> belongsToMany(Tag::class);
    }

    //relationship with post author model
      public function author()
      {
      return $this -> belongsTo(admin::class,'admin_id','id');
      }

}
