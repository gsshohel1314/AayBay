<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Loaner;
use Session;

class LoanerRecycleBinController extends Controller
{
  public function index(){
    $allRecycleLoaner=Loaner::onlyTrashed()->latest()->get();
    return view('admin.loanerRecycle.all',compact('allRecycleLoaner'));
  }

  public function show($id){
    $recycleLoaner=Loaner::onlyTrashed()->findOrFail($id);
    return view('admin.loanerRecycle.show',compact('recycleLoaner'));
  }

  public function restore($id){
    $loaner=Loaner::onlyTrashed()->findOrFail($id);
    $loaner->restore();

    Session::flash('success', 'Loaner Restore Success');
    return back();
    Session::flash('error', 'Loaner Restore Failed');
    return back();
  }

  public function delete($id){
    $loaner=Loaner::onlyTrashed()->findOrFail($id);
    $loaner->forceDelete();

    Session::flash('success', 'Loaner Delete Success');
    return back();
    Session::flash('error', 'Loaner Delete Failed');
    return back();
  }
}
