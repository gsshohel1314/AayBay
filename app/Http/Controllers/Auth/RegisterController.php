<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Carbon\Carbon;
use Session;
use Storage;
use Image;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
          'name'     => 'required|string|max:255',
          'email'    => 'required|string|email|max:255|unique:users',
          // 'role'     =>'required',
          'phone'    =>'required|string|unique:users',
          'image'=>'nullable|image|mimes:jpeg,jpg,png,bmp',
          'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
       $request = app('request');
      if($request->hasFile('image')){
        $image=$request->file('image');
        $userName=str_slug($request->name);
        $imageName= $userName .'_'. Carbon::today()->toDateString() .'.'. $image->getClientOriginalExtension();

        if(!Storage::disk('public')->exists('user')){
          Storage::disk('public')->makeDirectory('user');
        }
        Image::make($image)->save(public_path('storage/user/' . $imageName));
      }

        $create= User::create([
          'name'      => $data['name'],
          'email'     => $data['email'],
          // 'role_id'   => $data['role'],
          'phone'     => $data['phone'],
          'image'     => $imageName,
          // $user->image=$imageName;
          'password'=>Hash::make($data['password']),
          'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($create){
          Session::flash('success', 'User Registration Success');
          return redirect()->back();
        }else{
          Session::flash('error', 'User Registration Failed');
          return redirect()->back();
        }

    }
}
