<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApplicationForm;
use App\Models\ApplicationFee;
use App\Models\Career;
use App\Models\DocumentUpload;
use App\Models\PhdDetail;
use App\Models\TaughtCourses;
use App\Models\Admin;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\UploadedFile;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Mail\PaymentSuccessfulMail;
use App\Mail\ApplicationSubmittedMail;
use Illuminate\Support\Facades\Mail;


class HomeController extends Controller
{
     
    
    public function login()
    {
        return view('admin.login');
    }

    public function checkLogin(Request $request)
    {
        $request->validate([
            'email'   => 'required|email:rfc,dns',
            'password'   => 'required'
        ]);


        // dd(Hash::make($request->password));

        $data = Admin::where('email', $request->email)->first();
        if ($data) {
            if (! Hash::check($request->password, $data->password)) {
                Session::flash('message', 'You are not authorized to access !');
                return redirect('admin/login-panel');
            } else {
                session(['adminuser' => $data]);
                return redirect('admin/home');
            }
        } else {
            Session::flash('message', 'You are not authorized to access the admin !');
            return redirect('admin/login-panel');
        }
    }

    public function logout()
    {
        session(['adminuser' => '']);
        return redirect('admin/login-panel');
    }

    public function index()
    {   

       return view('admin/' . '.dashboard');
    }

    public function profile()
    {
        return view('admin.profileview');
    }

    public function thank_you_message()
    {

        $thanks_message = Session::get('thanks_message');
        if ($thanks_message) {
            return view('admin.thanks');
        } else {
            return redirect('/admin/home');
        }
    }

    public function changePassword()
    {
        return view('admin.change-password');
    }

    public function addChangePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:3|max:255',
        ], [
            'password.required' => 'password field is must be integer',
        ]);

        $info                  =   Admin::find($request->id);
        $info->password       =    Hash::make($request->password);
        $info->save();

        if ($info->id) {

            return redirect('admin/logout')->with('message', 'Your Password has been changed.');
        }
    }


    
        


    




    public function list(Request $request)
    {
        // Start building the query
        $query = ApplicationForm::orderBy('id', 'DESC');

        // Apply filters if present in the request
        if ($request->filled('position')) {
            $query->where('position', $request->input('position'));
        }

        if ($request->filled('faculty_department')) {
            $query->where('faculty_department', $request->input('faculty_department'));
        }

        if ($request->filled('payment')) {
            $query->where('paid', $request->input('payment'));
        }


        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%")
                  ->orWhere('mobile', 'like', "%$search%");
            });
        }


        $position = $request->input('position');
        $faculty_department = $request->input('faculty_department');
        $payment = $request->input('payment');
        $search = $request->input('search');


        // Paginate the results
        $data = $query->paginate(30);

        // Append the query parameters for pagination links
        $data->appends($request->all());
        

        // Pass data to the view
        return view('admin.applicationForm.index', compact('data','position', 'faculty_department','search','payment'));
    }

     public function download($id)
    {       
        $application_form = ApplicationForm::where('id', $id)->first();
        $passport_photograph = DocumentUpload::where('application_id',$id)->where('document_type','passport_photograph')->first();
        $phd_details = PhdDetail::where('application_id',$id)->get();
        $compulsory_courses = TaughtCourses::where('application_id',$id)->where('type','compulsory_courses')->get();
        $optional_courses = TaughtCourses::where('application_id',$id)->where('type','optional_courses')->get();
        $courses_taught = TaughtCourses::where('application_id',$id)->where('type','courses_taught')->get();
        $document_uploads = DocumentUpload::where('application_id',$id)->get(); 
        $courses_taughts = TaughtCourses::where('type', 'courses_taught')->where('application_id', $id)->get();
        $other_courses = TaughtCourses::where('type', 'other_courses')->where('application_id', $id)->get();
        $careers = Career::where('application_id', $id)->get();
        $best_Publications = TaughtCourses::where('type', 'best_Publications')->where('application_id', $id)->get();
        return view('download-application', compact('best_Publications','careers','other_courses','courses_taughts','document_uploads','courses_taught','application_form', 'passport_photograph','optional_courses','phd_details','compulsory_courses'));

    }


}
