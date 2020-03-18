<?php

namespace App\Http\Controllers\admin;

use App\Income;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\IncomeCategory;
use Session;

class IncomeController extends Controller
{

    public function index()
    {
      $allIncome=Income::all();
      return view('admin.income.all',compact('allIncome'));
    }


    public function create()
    {
      $allCategory=IncomeCategory::where('status',1)->get();
      return view('admin.income.add',compact('allCategory'));
    }


    public function store(Request $request)
    {
      $income=new Income();
      $income->details=$request->details;
      $income->amount=$request->amount;
      $income->date=$request->date;
      $income->in_cat_id=$request->category;
      $income->save();

      Session::flash('success', 'New income add successfully');
      return back();

      Session::flash('error', 'New income add Failed');
      return back();
    }


    public function show(Income $income)
    {
      return view('admin.income.view',compact('income'));
    }


    public function edit(Income $income)
    {
      $allCategory=IncomeCategory::where('status',1)->get();
      return view('admin.income.edit',compact('income','allCategory'));
    }


    public function update(Request $request, Income $income)
    {
      $income->details=$request->details;
      $income->amount=$request->amount;
      $income->date=$request->date;
      $income->in_cat_id=$request->category;
      $income->save();

      Session::flash('success', 'Income updated successfull');
      return back();

      Session::flash('error', 'Income updated Failed');
      return back();
    }


    public function destroy(Income $income)
    {
      $income->delete();

      Session::flash('success', 'Income deleted successfull');
      return back();

      Session::flash('error', 'Income deleted Failed');
      return back();
    }
}
