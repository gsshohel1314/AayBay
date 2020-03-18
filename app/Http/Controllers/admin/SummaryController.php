<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Income;
use App\Expense;
use Carbon\Carbon;
use Session;

class SummaryController extends Controller
{
    public function index(){
      // dd(Carbon::now()->format('F'));
      // $month=Carbon::now()->format('m');
      // $fullMonth= Carbon::now()->format('F');
      // $year=Carbon::now()->format('Y');
      // $income=Income::whereMonth('date','=',$month)->whereYear('date','=',$year)->get();
      // $totalIncome=Income::whereMonth('date','=',$month)->whereYear('date','=',$year)->sum('amount');
      // $expense=Expense::whereMonth('date','=',$month)->whereYear('date','=',$year)->get();
      // $totalExpense=Expense::whereMonth('date','=',$month)->whereYear('date','=',$year)->sum('amount');
      // return view('admin.summary.all',compact('fullMonth','income','totalIncome','expense','totalExpense'));


      // dd(Carbon::now()->format('Y'));
      $year=Carbon::now()->format('Y');
      $income=Income::whereYear('date','=',$year)->get();
      $totalIncome=Income::whereYear('date','=',$year)->sum('amount');
      $expense=Expense::whereYear('date','=',$year)->get();
      $totalExpense=Expense::whereYear('date','=',$year)->sum('amount');
      return view('admin.summary.all',compact('year','income','totalIncome','expense','totalExpense'));

    }

    public function search($from,$to){
      $fullMonth= Carbon::now()->format('F');
      $income=Income::whereBetween('date',[$from,$to])->get();
      $totalIncome=Income::whereBetween('date',[$from,$to])->sum('amount');
      $expense=Expense::whereBetween('date',[$from,$to])->get();
      $totalExpense=Expense::whereBetween('date',[$from,$to])->sum('amount');
      return view('admin.summary.search',compact('from','to','income','totalIncome','expense','totalExpense','fullMonth'));
    }
}
