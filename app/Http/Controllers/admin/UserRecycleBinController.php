<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Session;

class UserRecycleBinController extends Controller
{
    public function index(){
      $allRecycleUser=User::onlyTrashed()->latest()->get();
      return view('admin.userRecycle.all',compact('allRecycleUser'));
    }

    public function show($id){
      $recycleUser=User::onlyTrashed()->findOrFail($id);
      return view('admin.userRecycle.show',compact('recycleUser'));
    }

    public function restore($id){
      $user=User::onlyTrashed()->findOrFail($id);
      $user->restore();

      Session::flash('success', 'User Restore Success');
      return back();
      Session::flash('error', 'User Restore Failed');
      return back();
    }


    public function delete($id){
      $user=User::onlyTrashed()->findOrFail($id);
      $user->forceDelete();

      Session::flash('success', 'User Delete Success');
      return back();
      Session::flash('error', 'User Delete Failed');
      return back();
    }
}
