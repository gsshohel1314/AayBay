<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Charts;
use App\Income;
use App\Expense;
use App\User;
use App\Loaner;
use Carbon\Carbon;
use DB;

class AdminController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index(){
      // $today=Carbon::now()->format(Y-m-d);
      // $last_7days=Carbon::now()->subDays(7);
      // $last_7days_income=Income::where('status',1)->where('date','<=',$today)->where('date','>=',$last_7days)->get();
      // $last_7days_income_total=Income::where('status',1)->where('date','<=',$today)->where('date','>=',$last_7days)->sum('amount');
      // $last_7days_expense=Expense::where('status',1)->where('date','<=',$today)->where('date','>=',$last_7days)->get();
      // $last_7days_expense_total=Expense::where('status',1)->where('date','<=',$today)->where('date','>=',$last_7days)->sum('amount');
      // return view('admin.dashboard.index',compact('today','last_7days','last_7days_income','last_7days_income_total','last_7days_expense','last_7days_expense_total'));


      // dd(Carbon::now()->subDays(7));
      // dd(Carbon::now());
      $to=Carbon::now();
      $from=Carbon::now()->subDays(7);
      $income=Income::where('status',1)->whereBetween('created_at', [ $from,$to])->get();
      $incomeTotal=Income::where('status',1)->whereBetween('created_at', [ $from,$to])->sum('amount');
      $expense=Expense::where('status',1)->whereBetween('created_at', [ $from,$to])->get();
      $expenseTotal=Expense::where('status',1)->whereBetween('created_at', [ $from,$to])->sum('amount');


      $month=Carbon::now()->format('m');
      $fullMonth= Carbon::now()->format('F');
      $year=Carbon::now()->format('Y');
      $totalIncome=Income::whereMonth('date','=',$month)->sum('amount');
      $totalExpense=Expense::whereMonth('date','=',$month)->sum('amount');
      $saving=($totalIncome-$totalExpense);
      $donut=Charts::create('donut', 'highcharts')
          ->title($fullMonth)
          ->labels(['Income', 'Expense', 'Saving'])
          ->values([$totalIncome,$totalExpense,$saving])
          ->responsive(true);

      $bar = Charts::multi('bar', 'highcharts')
          ->title($fullMonth)
          ->labels([$fullMonth])
          ->dimensions(480, 400)
          ->dataset('Income', [$totalIncome])
          ->dataset('Expense', [$totalExpense])
          ->dataset('Saving', [$saving])
          ->responsive(false);

      $totalUser=User::count();
      $totalIn=Income::count();
      $totalEx=Expense::count();
      $totalLoaner=Loaner::count();
      return view('admin.dashboard.index',compact('totalUser','totalIn','totalEx','totalLoaner','income','incomeTotal','expense','expenseTotal','donut','bar'));
    }
}
