<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'name', 'email','role_id','phone','image', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected function roleName(){
      return $this->belongsTo('App\Role','role_id','id');
    }
}
