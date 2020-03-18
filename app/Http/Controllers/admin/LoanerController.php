<?php

namespace App\Http\Controllers\admin;

use App\Loaner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;
use App\LoanGiven;
use App\LoanReceive;
use Carbon\Carbon;
use Image;
use Storage;
use Session;

class LoanerController extends Controller
{

    public function index()
    {
      $allLoaner=Loaner::orderBy('id','DESC')->get();
      return view('admin.loaner.all',compact('allLoaner'));
    }


    public function create()
    {
      $role=Role::where('status',1)->get();
      return view('admin.loaner.add',compact('role'));
    }


    public function store(Request $request)
    {
      $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => 'required|string|email|max:255|unique:loaners',
        'phone'=>'required|string|unique:loaners',
        'image'=>'nullable|image|mimes:jpeg,jpg,png,bmp',
      ]);

      if($request->hasFile('image')){
        $image=$request->file('image');
        $LoanerName=str_slug($request->name);
        $imageName=$LoanerName.'-'.Carbon::today()->toDateString().'.'.$image->getClientOriginalExtension();

        if(!Storage::disk('public')->exists('loaner')){
          Storage::disk('public')->makeDirectory('loaner');
        }
        Image::make($image)->save(public_path('storage/loaner/'.$imageName));
      }

      $loaner=new Loaner();
      $loaner->name=$request->name;
      $loaner->email=$request->email;
      $loaner->phone=$request->phone;
      $loaner->image=$imageName;
      $loaner->save();

      Session::flash('success', 'Loaner Registration Success');
      return redirect()->back();
      Session::flash('error', 'Loaner Registration Failed');
      return redirect()->back();
    }


    public function show(Loaner $loaner)
    {
      // $loanerId=Loaner::where('status',1)->where('id',$id)->firstOrFail();
      $totalPayment=LoanGiven::where('loaner_id','=',$loaner->id)->sum('amount');
      $totalReceive=LoanReceive::where('loaner_id','=',$loaner->id)->sum('amount');
      $lastPayDate=LoanGiven::where('loaner_id','=',$loaner->id)->latest('id')->first();
      $lastRecDate=LoanReceive::where('loaner_id','=',$loaner->id)->latest('id')->first();
      $allGiven=LoanGiven::where('loaner_id','=',$loaner->id)->orderBy('id','DESC')->get();
      $allReceive=LoanReceive::where('loaner_id','=',$loaner->id)->orderBy('id','DESC')->get();
      return view('admin.loaner.view',compact('loaner','totalPayment','totalReceive','lastPayDate','lastRecDate','allGiven','allReceive'));
    }


    public function edit(Loaner $loaner)
    {
      return view('admin.loaner.edit',compact('loaner'));
    }


    public function update(Request $request, Loaner $loaner)
    {
      $request->validate([
        'name'     => 'required|string|max:255',
        'image'=>'nullable|image|mimes:jpeg,jpg,png,bmp',
      ]);

      if($request->hasFile('image')){
        $image=$request->file('image');
        $LoanerName=str_slug($request->name);
        $imageName=$LoanerName.'-'.Carbon::today()->toDateString().'.'.$image->getClientOriginalExtension();

        if(Storage::disk('public')->exists('loaner/'.$loaner->image)){
          Storage::disk('public')->delete('loaner/'.$loaner->image);
        }
        Image::make($image)->save(public_path('storage/loaner/'.$imageName));
      }else{
        $imageName=$loaner->image;
      }

      $loaner->name=$request->name;
      $loaner->phone=$request->phone;
      $loaner->image=$imageName;
      $loaner->save();

      Session::flash('success', 'Loaner updated Success');
      return redirect()->back();
      Session::flash('error', 'Loaner updated Failed');
      return redirect()->back();
    }


    public function destroy(Loaner $loaner)
    {
      $delete=$loaner->delete();

      if($delete){
        Session::flash('success', 'Loaner softdelete Success');
      return back();
      }else{
        Session::flash('error', 'Loaner softdelete Failed');
      return back();
      }
    }

    public function status($id){
      $loaner=Loaner::find($id);
      if($loaner->status==false){
        $loaner->status=true;
        $loaner->save();
        Session::flash('success', 'Loaner successfully approved');
        return back();
      }else{
        $loaner->status=false;
        $loaner->save();
        Session::flash('success', 'Loaner successfully Rejected');
        return back();
      }
    }

}
