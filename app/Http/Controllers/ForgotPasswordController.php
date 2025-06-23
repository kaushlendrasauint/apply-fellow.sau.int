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

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('forget');
    }

    public function sendResetLinkEmail(Request $request)
    {

        // Validate the input
        $request->validate([
            'email' => 'required|email',
        ]);

        // Check if the email exists in the database
        $user = DB::table('registions')->where('email', $request->email)->first();

        if ($user) {
            // Generate a new random password
            $newPassword = Str::random(10);

            // Update the password in the database
            DB::table('registions')
                ->where('email', $request->email)
                ->update(['password' => $newPassword]);
            //   ->update(['password' => Hash::make($newPassword)]);

            // Prepare email content
            $emailContent = "
            Dear {$user->name},\n
            Your login email ID: {$user->email}\n
            Your new password: $newPassword\n
            Please use these credentials to log in to your account. For security reasons, we recommend changing your password after logging in.\n        ";


           



            try {
               // Send the new password to the user's email
                Mail::raw($emailContent, function ($message) use ($user) {
                    $message->to($user->email)
                        ->subject('Your New Password : SAU Recruitment Portal');
                });
            } catch (\Exception $e) {
                // Check for a specific Gmail SMTP error related to sending limits
                if ($e instanceof Swift_TransportException) {
                    // Check the exception message for Gmail's sending limit exceeded error
                    if (strpos($e->getMessage(), '550-5.4.5 Daily user sending limit exceeded') !== false) {
                        // Log the error (optional for debugging)
                        \Log::error('Gmail daily sending limit exceeded for email: ' . $user_data->email);

                        // Redirect back with a validation-like error message
                        return redirect()->back()->withErrors([
                            'email_error' => 'Sorry, email delivery failed. You have exceeded the daily email sending limit. Please try again later.'
                        ]);
                    }
                }

                // If it's another type of error, log it and return a generic error message
                \Log::error('Email failed to send: ' . $e->getMessage());

                return redirect()->back()->withErrors([
                    'email_error' => 'There was an error sending the email. Please try again later.'
                ]);
            }


            

            // Flash success message
            Session::flash('success', 'Your new password has been sent to your registered email.');
        } else {
            // Flash error message
            Session::flash('warning', 'You are not registered with us.');
        }

        // Redirect back
        return redirect()->back();
    }
}