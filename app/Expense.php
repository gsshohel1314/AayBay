<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
  use SoftDeletes;

  protected function categoryName(){
    return $this->belongsTo('App\ExpenseCategory','ex_cat_id','id');
  }
}
