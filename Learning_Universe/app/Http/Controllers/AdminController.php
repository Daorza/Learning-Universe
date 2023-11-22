<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminController extends Controller
{

public function Index(){
    return view('admin.admin_login');
}   //end method


    public function Dashboard(){
        return view('admin.index');
    } //end method

    public function Login(Request $request){
       // dd($request->all());

        $check = $request->all();
        if(Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password'] ])){
             return redirect()->route('admin.dashboard')->with('error', 'Admin Login Succesfully');
        }else{
            return back()->with('error', 'Invalid Email Or Password');
        }

    } //end method

    public function AdminLogout(){
        Auth::guard('admin')->logout();
        return redirect()->route('login_form')->with('error', 'Admin LogOut Succesfully');
        } //end method


    public function AdminRegister(){

        return view('admin.admin_register');
    } //end method

    public function AdminRegisterCreate(Request $request){

       // dd($request->all());

        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make($request->pasword),
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('login_form')->with('error', 'Admin Register Succesfully');

    } //end method

}
