<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class admin extends User
{
    use HasFactory,Notifiable;

    protected $guarded = [];

    // get admin role
   public function user_role()
   {
        return $this -> belongsTo(Role::class,'role_id','id');
   }

}
