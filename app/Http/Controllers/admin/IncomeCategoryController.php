<?php

namespace App\Http\Controllers\admin;

use App\IncomeCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class IncomeCategoryController extends Controller
{

    public function index()
    {
      $allIncomeCategory=IncomeCategory::orderBy('id','DESC')->get();
      return view('admin.incomeCategory.all',compact('allIncomeCategory'));
    }


    public function create()
    {
      return view('admin.incomeCategory.add');
    }


    public function store(Request $request)
    {
      $request->validate([
        'name'=> 'required|string|max:255|unique:income_categories',
      ]);

      $incomeCategory= new IncomeCategory();
      $incomeCategory->name=$request->name;
      $incomeCategory->status=(boolean)$request->status;
      $incomeCategory->save();

      Session::flash('success', 'New income category add success');
      return back();
      Session::flash('error', 'New income category add Failed');
      return back();
    }


    public function show(IncomeCategory $incomeCategory, $id)
    {
      $incomeCategory=IncomeCategory::where('id',$id)->firstOrFail();
      return view('admin.incomeCategory.view',compact('incomeCategory'));
    }


    public function edit(IncomeCategory $incomeCategory,$id)
    {
      $incomeCategory=IncomeCategory::findOrFail($id);
      return view('admin.incomeCategory.edit',compact('incomeCategory'));
    }


    public function update(Request $request, IncomeCategory $incomeCategory, $id)
    {
      $incomeCategory=IncomeCategory::findOrFail($id);

      // $request->validate([
      //   'name'=> 'required|string|max:255|unique:income_categories',
      // ]);

      $incomeCategory->name=$request->name;
      $incomeCategory->status=(boolean)$request->status;
      $incomeCategory->save();

      Session::flash('success', 'New income category update success');
      return back();
      Session::flash('error', 'New income category update Failed');
      return back();
    }


    public function destroy(IncomeCategory $incomeCategory, $id)
    {
      $incomeCategory=IncomeCategory::findOrFail($id);
      $incomeCategory->delete();

      Session::flash('success', 'Category delete successfull');
      return back();
      Session::flash('error', 'Category delete Failed');
      return back();
    }
}
