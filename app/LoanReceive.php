<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanReceive extends Model
{
  protected function loanReceiveName(){
    return $this->belongsTo('App\Loaner','loaner_id','id');
  }
}
