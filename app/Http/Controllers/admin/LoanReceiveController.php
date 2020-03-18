<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\LoanReceive;
use Carbon\Carbon;
use Session;


class LoanReceiveController extends Controller
{
  public function index(){
    $allLoanReceive=LoanReceive::orderBy('id','DESC')->get();
    return view('admin.loanReceive.all',compact('allLoanReceive'));
  }

  public function receive(Request $request){
    $loanreceive=new LoanReceive();
    $loanreceive->amount=$request->amount;
    $loanreceive->date=$request->date;
    $loanreceive->loaner_id=$request->loaner_id;
    $loanreceive->save();

    Session::flash('success', 'Loan Receive Success');
    return redirect()->back();
    Session::flash('error', 'Loan Receive Failed');
    return redirect()->back();
  }

  public function show($id)
  {
    $receiveId=LoanReceive::findOrFail($id);
    return view('admin.loanReceive.view',compact('receiveId'));
  }

  public function delete($id)
  {
    $receiveId=LoanReceive::findOrFail($id);
    $receiveId->delete();

    Session::flash('success', 'Loan Receive User delete successfull');
    return back();
    Session::flash('error', 'Loan Receive User delete Failed');
    return back();
  }
}
