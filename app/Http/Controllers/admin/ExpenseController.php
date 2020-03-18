<?php

namespace App\Http\Controllers\admin;

use App\Expense;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ExpenseCategory;
use Session;

class ExpenseController extends Controller
{

    public function index()
    {
      $allExpense=Expense::all();
      return view('admin.expense.all',compact('allExpense'));
    }


    public function create()
    {
      $allCategory=ExpenseCategory::where('status',1)->get();
      return view('admin.expense.add',compact('allCategory'));
    }


    public function store(Request $request)
    {
      $expense=new Expense();
      $expense->details=$request->details;
      $expense->amount=$request->amount;
      $expense->date=$request->date;
      $expense->ex_cat_id=$request->category;
      $expense->save();

      Session::flash('success', 'New expense add successfully');
      return back();

      Session::flash('error', 'New expense add Failed');
      return back();
    }


    public function show(Expense $expense)
    {
      return view('admin.expense.view',compact('expense'));
    }


    public function edit(Expense $expense)
    {
      $allCategory=ExpenseCategory::where('status',1)->get();
      return view('admin.expense.edit',compact('expense','allCategory'));
    }


    public function update(Request $request, Expense $expense)
    {
      $expense->details=$request->details;
      $expense->amount=$request->amount;
      $expense->date=$request->date;
      $expense->ex_cat_id=$request->category;
      $expense->save();

      Session::flash('success', 'Expense updated successfull');
      return back();

      Session::flash('error', 'Expense updated Failed');
      return back();
    }


    public function destroy(Expense $expense)
    {
      $expense->delete();

      Session::flash('success', 'Expense deleted successfull');
      return back();

      Session::flash('error', 'Expense deleted Failed');
      return back();
    }
}
