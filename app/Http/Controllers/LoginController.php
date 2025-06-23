<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;
use Str;
use App\Models\Registion;
use App\Models\TempUserdata;
use App\Models\ApplicationForm;
use Mail;
use App\Mail\OtpMail;
use App\Mail\UserIdPasswordMail;
use App\Models\ApplicationFee;



class LoginController extends Controller
{

    public function checkLogin(Request $request)
    {
        $request->validate([
            'email'   => 'required',
            'password'   => 'required'
        ]);
        $password   =   $request->password;
        $data = Registion::where('email', $request->email)->where('password', $request->password)->first();
        if ($data) {
            session(['user' => $data]);
            $form = ApplicationForm::find($data->id);
           if ($form && $form->is_complete == '1') {
                return redirect('success');
            } else {
                return redirect('step1');
            }

        } else {
            return redirect('SignIn')->with('warning', 'Please enter correct email/password');
        }
    }


    public function userRegister(Request $request)
    {

        $request->validate([
            'name' => 'required',
            // 'email'=> "required|email|unique:registions,email,$request->email",
            // 'mobile'=> 'required|min:10',
            //'g-recaptcha-response' => 'required',   
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'mobile.required' => 'Mobile is required',
            //  'g-recaptcha-response.required' => 'Captcha must be accepted',            
        ]);


        DB::table('temp_userdatas')->where('email', $request->email)->delete();

        $otp = random_int(1000, 9999);
        $info        =   new TempUserdata;
        $info->name              =   $request->name;
        $info->email          =   $request->email;
        $info->programme          =   $request->programme;
        $info->mobile             =   $request->mobile;
        $info->password       =     Hash::make(Str::random(5));
        $info->pass       =    Str::random(5);
        $info->otp                = $otp;
        $info->profile_status = '0';
        $info->save();
        $data = TempUserdata::where('id', $info->id)->where('profile_status', '0')->first();

        if ($data) {
            $user_data     =   TempUserdata::find($info->id);
            $mailData = [
                'name' => $user_data->name,
                'otp' => $user_data->otp
            ];
            Mail::to($user_data->email)->send(new OtpMail($mailData));
            return redirect('otp/' . Crypt::encrypt($info->id))->with('success', 'Check your mail for verification and mail check in spam also.');
        }
    }



    public function logout()
    {
        session(['user' => '']);
        return redirect('SignIn');
    }


    public function dashboard()
    {
        $id = Session::get('user')->id;
        $data = session("user");
        return view('dashboard');
    }

    public function otp($id)
    {
        $id =   Crypt::decrypt($id);
        return view('otp');
    }



    public function verifyOtp(Request $request)
    {
        //DB::enableQueryLog(); // Enable query log
        $tempUser     =   TempUserdata::where('id', Crypt::decrypt($request->userId))->where('otp', $request->otp)->first();
        // dd(DB::getQueryLog()); // Dump the log

        if ($tempUser) {

            //   dd($tempUser);

            $registion        =   new Registion;
            $registion->id    =   $tempUser->id;
            $registion->name  =   $tempUser->name;
            $registion->email =   $tempUser->email;
            $registion->mobile =   $tempUser->mobile;
            $registion->password =     $tempUser->pass;
            //  $registion->profile_status ='1';
            $registion->save();

            $admission        =   new ApplicationForm;
            $admission->id         =   $tempUser->id;
            $admission->step       =   0;
            $admission->is_complete =   0;
            $admission->name       =   $tempUser->name;
            $admission->email      =   $tempUser->email;
            $admission->mobile     =   $tempUser->mobile;
            $admission->save();

            $mailData = [
                'name' =>  $tempUser->name,
                'email' =>  $tempUser->email,
                'password' => $tempUser->pass
            ];
            Mail::to($tempUser->email)->send(new UserIdPasswordMail($mailData));
            session(['user' => $registion]);
            return redirect('step/')->with('success', 'Your SAU Recruitment Portal Login Details has been sent in registered email id ');
        } else {
            return redirect('otp/' . $request->userId)->with('warning', 'I have entered the wrong OTP.');
        }
    }

    public function forget(Request $request)
    {

        $tempUser     =   Registion::where('email', $request->email)->first();
        if ($tempUser) {

            $mailData = [
                'name' =>  $tempUser->name,
                'email' =>  $tempUser->email,
                'password' => $tempUser->password
            ];
            Mail::to($tempUser->email)->send(new UserIdPasswordMail($mailData));
            //session(['user'=> $registion]);
            return redirect('SignIn/')->with('success', 'Your SAU Admission Portal Login Details has been sent in registered email id ');
        } else {
            return redirect('SignIn/')->with('warning', 'Please Enter correct EmailId');
        }
    }
}