<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Income;
use App\Expense;
use App\Loaner;
use App\IncomeCategory;
use App\ExpenseCategory;
use App\LoanGiven;
use App\LoanReceive;

class ManageController extends Controller
{
    public function index(){
      $allIncomeCategory=IncomeCategory::where('status',1)->count();
      $allExpenseCategory=ExpenseCategory::where('status',1)->count();
      $allIncomeRecycle=Income::onlyTrashed()->count();
      $allExpenseRecycle=Expense::onlyTrashed()->count();
      $allUserRecycle=User::onlyTrashed()->count();
      $allLoanerRecycle=Loaner::onlyTrashed()->count();
      $allLoanGiven=LoanGiven::orderBy('id','DESC')->count();
      $allLoanReceive=LoanReceive::orderBy('id','DESC')->count();
      return view('admin.manage.index',compact('allIncomeCategory','allExpenseCategory','allIncomeRecycle','allExpenseRecycle','allUserRecycle','allLoanerRecycle','allLoanGiven','allLoanReceive'));
    }
}
