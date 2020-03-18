<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LoanGiven;
use Carbon\Carbon;
use Session;

class LoanGivenController extends Controller
{
    public function index(){
      $allLoanGiven=LoanGiven::orderBy('id','DESC')->get();
      return view('admin.loanGiven.all',compact('allLoanGiven'));
    }

    public function create(Request $request){
      $loangiven=new LoanGiven();
      $loangiven->amount=$request->amount;
      $loangiven->date=$request->date;
      $loangiven->loaner_id=$request->loaner_id;
      $loangiven->save();

      Session::flash('success', 'Loan given Success');
      return redirect()->back();
      Session::flash('error', 'Loan given Failed');
      return redirect()->back();
    }

    public function show($id)
    {
      $givenId=LoanGiven::findOrFail($id);
      return view('admin.loanGiven.view',compact('givenId'));
    }

    public function delete($id)
    {
      $givenId=LoanGiven::findOrFail($id);
      $givenId->delete();

      Session::flash('success', 'Loan Given User delete successfull');
      return back();
      Session::flash('error', 'Loan Given User delete Failed');
      return back();
    }

}
