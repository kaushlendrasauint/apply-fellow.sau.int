<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicationForm;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use App\Models\TempUserdata;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;
use Str;
use Mail;
use App\Mail\OtpMail;
use App\Mail\UserIdPasswordMail;

class SignupController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:application_forms,email',
                'mobile' => 'required|numeric|digits:10',
            ],
            [
                'name.required' => 'The name field is required.',
                'name.string' => 'The name must be a valid string.',
                'name.max' => 'The name may not be greater than 255 characters.',
                'email.required' => 'The email field is required.',
                'email.email' => 'The email must be a valid email address.',
                'email.unique' => 'This email is already in use. Please provide a unique email.',
                'mobile.required' => 'The mobile number field is required.',
                'mobile.numeric' => 'The mobile number must contain only numbers.',
                'mobile.digits' => 'The mobile number must be exactly 10 digits long.',
            ]
        );
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Save to database
        $application = new TempUserdata;
        $otp = random_int(1000, 9999);
        $application->name = $request->name;
        $application->email = $request->email;
        $application->mobile = $request->mobile;
        $application->password = Hash::make(Str::random(5));
        $application->pass = Str::random(5);
        $application->otp = $otp;
        $application->profile_status = '0';
        $application->save();
    
        $data = TempUserdata::where('id', $application->id)->where('profile_status', '0')->first();
    
        if ($data) {
            $user_data = TempUserdata::find($application->id);
            $mailData = [
                'name' => $user_data->name,
                'otp' => $user_data->otp,
            ];
    
            try {
                Mail::to($user_data->email)->send(new OtpMail($mailData));
    
                // Redirect with success message
                return redirect()->route('otp.view', ['id' => Crypt::encrypt($application->id)])
                    ->with('success', 'Check your mail for verification. Check spam if not found.');
            } catch (\Exception $e) {
                if ($e instanceof \Swift_TransportException &&
                    strpos($e->getMessage(), '550-5.4.5 Daily user sending limit exceeded') !== false) {
                    \Log::error('Gmail daily sending limit exceeded for email: ' . $user_data->email);
                    return redirect()->back()->withErrors([
                        'email' => 'Email delivery failed. You have exceeded the daily email sending limit. Please try again later.',
                    ])->withInput();
                }
    
                // Redirect with generic error
                return redirect()->back()->withErrors([
                    'email' => 'There was an error sending the email. Please try again later.',
                ])->withInput();
            }
        }
    
        return redirect()->back()->with('error', 'Unexpected error occurred. Please try again.');
    }
}