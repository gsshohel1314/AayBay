<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanGiven extends Model
{
  protected function loanGivenName(){
    return $this->belongsTo('App\Loaner','loaner_id','id');
  }
}
