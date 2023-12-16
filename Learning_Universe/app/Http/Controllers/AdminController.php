<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Charts\MonthlyClassCompletedChart;
use App\Charts\MonthlyMembersChart;
use Carbon\Carbon;

class AdminController extends Controller
{

public function Index(){
    return view('admin.admin_login');
}   //end method


    public function Dashboard(){
        return view('admin.dashboardadmin');
    } //end method

    public function showCharts()
    {
        $monthlyMembersData = [
            35,  // January
            59,  // February
            37,  // March
            17,  // April
            56   // May
        ];
        $monthlyMembersChart = new MonthlyMembersChart;
        $monthlyMembersChart->labels(['January', 'February', 'March', 'April', 'May'])
                            ->dataset('Monthly Members', 'line', $monthlyMembersData);

        $monthlyClassData = [
            65,  // January
            59,  // February
            20,  // March
            11,  // April
            56   // May
        ];

        $monthlyClassCompletedChart = new MonthlyClassCompletedChart;
        $monthlyClassCompletedChart->labels(['January', 'February', 'March', 'April', 'May'])
                            ->dataset('Monthly ClassCompleted', 'line', $monthlyClassData);

        return view('Admin.dashboardadmin', compact('monthlyMembersChart', 'monthlyClassCompletedChart'));
    }

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
            'updated_at'=> Carbon::now(),
        ]);

        return redirect()->route('login_form')->with('error', 'Admin Register Succesfully');

    } //end method

}
