<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Employee;
use App\Attendance;
use DB;
use Session; 

class UserAuthController extends Controller
{
    function login()
    {
        return view('auth.login'); //you can use Slash here also
    }                       

    function check(Request $request)
    {
        $request->validate([
            'id'=>'required',
            'password' => 'required'
          ]);

        $id = $request->get('id');
        $password = $request->get('password');
        
        $data=employee::Where('emp_no','=', $id)->where('delete_flag','=',false)->first();
            if($password == $data['password']){
                    Session::put('employee', $data);
                    // $attendances = Attendance::all();
                    $attendances = DB::table('attendances')
                    ->where('attend_date', date('Y-m-d'))
                    ->where('emp_id', $data->id)
                    ->get();   

                    return view('main')->with('attendances',$attendances);
            }else{
                dd('password does not match');
            }    
    }

}
