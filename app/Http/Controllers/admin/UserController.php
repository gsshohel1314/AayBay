<?php

namespace App\Http\Controllers\admin;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use TJGazel\Toastr\Facades\Toastr;
// use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Session;
use Image;
use Storage;

class UserController extends Controller
{

    public function index()
    {
      $allUser=User::orderBy('id','DESC')->get();
      return view('admin.user.all',compact('allUser'));
    }


    public function create()
    {
      $role=Role::where('status',1)->get();
      return view('admin.user.add',compact('role'));
    }


    public function store(Request $request)
    {
      $this->validate($request,[
        'name'     => 'required|string|max:255',
        'email'    => 'required|string|email|max:255|unique:users',
        'role'     =>'required',
        'image'=>'nullable|image|mimes:jpeg,jpg,png,bmp',
        'password' => 'required|string|min:6|confirmed',
      ],[
        'name.required'   =>'Please enter your name',
        'email.required'  =>'Please enter your valid email',
        'role.required'   =>'Please select user role',
        'image.required'  =>'Please select user image',
      ]);

      if($request->hasFile('image')){
        $image=$request->file('image');
        $userName=str_slug($request->name);
        $imageName= $userName .'_'. Carbon::today()->toDateString() .'.'. $image->getClientOriginalExtension();

        if(!Storage::disk('public')->exists('user')){
          Storage::disk('public')->makeDirectory('user');
        }
        Image::make($image)->save(public_path('storage/user/' . $imageName));
      }

      $user = new User();
      $user->name=$request->name;
      $user->email=$request->email;
      $user->phone=$request->phone;
      $user->role_id=$request->role;
      $user->image=$imageName;
      // $user->password=Crypt::encrypt($request->password);
      $user->password=Hash::make($request->password);
      $user->save();

      Session::flash('success', 'User Registration Success');
      return redirect()->back();
      Session::flash('error', 'User Registration Failed');
      return redirect()->back();

      // Toastr::success('User Registration Success', 'Success');
      // return redirect()->back();
      //
      // Toastr::error('User Registration Failed', 'Error');
      // return redirect()->back();

    }


    public function show(User $user)
    {
      return view('admin.user.view',compact('user'));
    }


    public function edit(User $user)
    {
      $role=Role::where('status',1)->get();
      return view('admin.user.edit',compact('role','user'));
    }


    public function update(Request $request, User $user)
    {
      $this->validate($request,[
        'name'     => 'required|string|max:255,name,'.$user->id,
        'role'     =>'required',
        'image'=>'nullable|image|mimes:jpeg,jpg,png,bmp',
      ]);

      if($request->hasFile('image')){
        $image=$request->file('image');
        $userName=str_slug($request->name);
        $imageName= $userName .'_'. Carbon::today()->toDateString() .'.'. $image->getClientOriginalExtension();

        if(Storage::disk('public')->exists('user/'.$user->image)){
          Storage::disk('public')->delete('user/'.$user->image);
        }
        Image::make($image)->save(public_path('storage/user/' . $imageName));
      }
      else{
        $imageName=$user->image;
      }

      $user->name=$request->name;
      $user->role_id=$request->role;
      $user->phone=$request->phone;
      $user->image=$imageName;
      $user->save();

      Session::flash('success', 'User Registration Update Success');
      return redirect()->back();

      Session::flash('error', 'User Registration Update Failed');
      return redirect()->back();

    }


    public function destroy(User $user)
    {
      $delete=$user->delete();

      if($delete){
        Session::flash('success', 'User softdelete Success');
      return back();
      }else{
        Session::flash('error', 'User softdelete Failed');
      return back();
      }

    }

    public function status($id){
      $users=User::find($id);
      if($users->status==false){
        $users->status=true;
        $users->save();
        Session::flash('success', 'User Request successfully approved');
        return back();
      }else{
        $users->status=false;
        $users->save();
        Session::flash('success', 'User Request successfully deny');
        return back();
      }
    }
}
