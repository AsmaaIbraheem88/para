<?php

namespace App\Http\Controllers\Admin;
use App\User;
// use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\AdminResetPassword;
use Carbon\Carbon;
use DB;
use Mail;
use Hash;

class AdminAuth extends Controller {

	public function login() {
		return view('admin.login');
	}

	public function dologin(Request $request) {
		

        $rememberme = request('rememberme') == 1?true:false;
		if (admin()->attempt(['email' => request('email'), 'password' => request('password')], $rememberme)) {
			return redirect('admin');
		} else {
			session()->flash('error','inccorrect information');
			return redirect(aurl('login'));
		}
    }
    
   
   
    //////////////////////////////////

	public function logout() {
		auth()->guard('admin')->logout();
		return redirect(aurl('login'));
    }
    
    /////////////////////////////////

	public function forgot_password() {
		return view('admin.forgot_password');
    }
    


	public function forgot_password_post(Request $request) {

        $user = User::where('email',$request->email)->first();

        if($user)
        {

         $code =rand('1111','9999');
         $user->pin_code=$code;
         $user->save();

         $update = $user->update(['pin_code' => $code]);

         if($update)
         {
              Mail::to($user->email)
              ->send(new AdminResetPassword($user));
			session()->flash('success','the reset link sent on email');
			return back();

         }

        }

        return back();
    }
    
    ////////////////////////////////////////////////

    
	public function reset_password($pin_code) {
	
		return view('admin.reset_password', ['data' => $pin_code]);
		
    }
    


	public function reset_password_final(Request $request) {


        $validator = validator()->make($request->all(),[

            'email'=>'required',
            'password'=>'required|confirmed', 
     
        ]);

       if($validator->fails())
       {
            $data = $validator->errors();
            return responseJson('0',$validator->errors()->first(),$data);
       }

        $user = User::where('email',$request->email)
                       ->where('pin_code',$request->pin_code)
                      ->where('pin_code','!=',0)->first();
        if($user) {
            $user->password = bcrypt($request->password);
            $user->pin_code = null;
            $user->save();
            if($user->save()){
                return redirect(aurl());
            }else{
                session()->flash('error','inccorrect information');
            }

        }else{
            session()->flash('error','inccorrect information');
       }


	}





////////////////////////////////////////////////////////////

	public function changePassword()
    {
        return view('admin.change-password');
	}
	



    public function changePasswordSave(Request $request)
    {
		
		$this->validate($request, [
			'password'              => 'required|confirmed|min:6',
			'old-password' => 'required',
		]);
        
        $user = auth('admin')->user();
        
        if (Hash::check($request->input('old-password'), $user->password)) {
            // The passwords match...
            $user->password = bcrypt($request->input('password'));
			$user->save();
			
			session()->flash('success', 'password changeed successfully');
			return redirect(aurl('change-password'));
           
        }else{

			session()->flash('error', 'incorrect old password');
			return redirect(aurl('change-password'));
        }
        
    }

////////////////////////////////////////////////////////////////





}
