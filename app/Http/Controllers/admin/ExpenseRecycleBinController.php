<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Expense;
use Session;

class ExpenseRecycleBinController extends Controller
{
    public function index(){
      $allRecycleExpense=Expense::onlyTrashed()->latest()->get();
      return view('admin.expenseRecycle.all',compact('allRecycleExpense'));
    }

    public function show($id){
      $recycleExpense=Expense::onlyTrashed()->findOrFail($id);
      return view('admin.expenseRecycle.show',compact('recycleExpense'));
    }

    public function restore($id){
      $expense=Expense::onlyTrashed()->findOrFail($id);
      $expense->restore();

      Session::flash('success', 'Expense Restore Success');
      return back();
      Session::flash('error', 'Expense Restore Failed');
      return back();
    }

    public function delete($id){
      $expense=Expense::onlyTrashed()->findOrFail($id);
      $expense->forceDelete();

      Session::flash('success', 'Expense Delete Success');
      return back();
      Session::flash('error', 'Expense Delete Failed');
      return back();
    }
}
