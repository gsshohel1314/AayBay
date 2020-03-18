<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loaner extends Model
{
  use SoftDeletes;
  // protected function givenStatus(){
  //   return $this->belongsTo('App\LoanGiven','loaner_id','id');
  // }
}
