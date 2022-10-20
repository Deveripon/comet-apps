<?php

namespace App\Models;

use App\Models\TagProduct;
use App\Models\CategoryProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
