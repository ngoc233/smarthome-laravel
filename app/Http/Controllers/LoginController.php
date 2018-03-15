<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\HomeHumidity;
use Carbon\Carbon;
use Input;
use DB;
use Validator;
class LoginController extends Controller
{
    public function getLogin()
    {
    	return view('admin.login');
    }
    public function postLogin(Request $request)
    {
    	$data = $request->all();
        unset($data['_token']);
        DB::beginTransaction();
        try
        {
            $message = 
            [
                'email.required'          => 'Email không được để trống',
                'email.min'               => 'Email không được it hơn 6 kí tự',
                'email.max'               => 'Email không được quá 100 kí tự',
                'password.min'               => ' Mật khẩu không được it hơn 6 kí tự',
                'password.max'               => ' Mật khẩu không được quá 20 kí tự',
                'password.required'			 => ' Mật khẩu không được để chống'
                
            ];        
            $validator = Validator::make($data,
                [
                    'email'               =>  'required|min:6|max:100',
                    'password'          =>  'required|min:6|max:20',
                    
                ],$message);
            if ($validator->fails())
            {
                return redirect()->back()->withInput($data)->withErrors($validator);
            }
            if (Auth::attempt(['email' => $data['email'],'password' =>$data['password'] ]))
           	{
           		return redirect(url('admin/dashboard'));
            }
            else
            {
            	return redirect(url('admin/login'));
            }
        }
        catch (Exception $e)
        {
            DB::rollback();
            response()->json([
                    'error' => true,
                    'message' => 'Internal Server Error'
                ], 500);
        }
    }
    public function logOut()
    {
        Auth::logout();
        return redirect('admin/login');
    }
}
