<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Income;
use Session;

class IncomeRecycleBinController extends Controller
{
  public function index(){
    $allRecycleIncome=Income::onlyTrashed()->latest()->get();
    return view('admin.incomeRecycle.all',compact('allRecycleIncome'));
  }

  public function show($id){
    $recycleIncome=Income::onlyTrashed()->findOrFail($id);
    return view('admin.incomeRecycle.show',compact('recycleIncome'));
  }

  public function restore($id){
    $income=Income::onlyTrashed()->findOrFail($id);
    $income->restore();

    Session::flash('success', 'Income Restore Success');
    return back();
    Session::flash('error', 'Income Restore Failed');
    return back();
  }


  public function delete($id){
    $income=Income::onlyTrashed()->findOrFail($id);
    $income->forceDelete();

    Session::flash('success', 'Income Delete Success');
    return back();
    Session::flash('error', 'Income Delete Failed');
    return back();
  }
}
