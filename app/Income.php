<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Income extends Model
{
  use SoftDeletes;
  
  protected function categoryName(){
    return $this->belongsTo('App\IncomeCategory','in_cat_id','id');
  }
}
