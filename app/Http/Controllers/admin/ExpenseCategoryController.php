<?php

namespace App\Http\Controllers\admin;

use App\ExpenseCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class ExpenseCategoryController extends Controller
{

    public function index()
    {
      $allExpenseCategory=ExpenseCategory::orderBy('id','DESC')->get();
      return view('admin.expenseCategory.all',compact('allExpenseCategory'));
    }


    public function create()
    {
      return view('admin.expenseCategory.add');
    }


    public function store(Request $request)
    {
      $request->validate([
        'name'=> 'required|string|max:255|unique:expense_categories',
      ]);

      $expenseCategory= new ExpenseCategory();
      $expenseCategory->name=$request->name;
      $expenseCategory->status=(boolean)$request->status;
      $expenseCategory->save();

      Session::flash('success', 'New expense category add success');
      return back();
      Session::flash('error', 'New expense category add Failed');
      return back();
    }


    public function show(ExpenseCategory $expenseCategory,$id)
    {
      $expenseCategory=ExpenseCategory::findOrFail($id);
      return view('admin.expenseCategory.view',compact('expenseCategory'));
    }


    public function edit(ExpenseCategory $expenseCategory,$id)
    {
      $expenseCategory=ExpenseCategory::findOrFail($id);
      return view('admin.expenseCategory.edit',compact('expenseCategory'));
    }


    public function update(Request $request, ExpenseCategory $expenseCategory,$id)
    {
      $expenseCategory=ExpenseCategory::findOrFail($id);

      $expenseCategory->name=$request->name;
      $expenseCategory->status=(boolean)$request->status;
      $expenseCategory->save();

      Session::flash('success', 'Expense category update success');
      return back();
      Session::flash('error', 'Expense category update Failed');
      return back();
    }


    public function destroy(ExpenseCategory $expenseCategory,$id)
    {
      $expenseCategory=ExpenseCategory::findOrFail($id);
      $expenseCategory->delete();

      Session::flash('success', 'Category delete successfull');
      return back();
      Session::flash('error', 'Category delete Failed');
      return back();
    }
}
