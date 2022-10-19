<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category()
    {
      return  $this -> belongsToMany(CategoryProduct::class);
    }

    public function tag()
    {
      return $this -> belongsToMany(TagProduct::class);
    }
}
