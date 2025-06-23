<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApplicationForm;
use App\Models\ApplicationFee;
use App\Models\Career;
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
     
    public function FLSProfessor() {
        $datas = ApplicationForm::where('faculty_department', 'Faculty of Legal Studies')
                                ->where('position', 'Professor')
                                ->where('application_for', 'Teaching')
                                ->where('paid', '1')
                                ->get();
        $records = [];
        foreach ($datas as $data) {
            $fee = ApplicationFee::where('payment', 'Success')
                                ->where('application_id', $data->id)
                                ->orderBy('created_at', 'desc')
                                ->first();
            $application_form = ApplicationForm::where('id', $data->id)->first();
            $records[] = compact('application_form', 'fee');
        }
       return view('admin.teaching-download-application', compact('records'));
    }

    public function FLSAssistant() {
        $datas = ApplicationForm::where('faculty_department', 'Faculty of Legal Studies')
                                ->where('position', 'Assistant Professor')
                                ->where('application_for', 'Teaching')
                                ->where('paid', '1')
                                ->get();
        $records = [];
        foreach ($datas as $data) {
            $fee = ApplicationFee::where('payment', 'Success')
                                ->where('application_id', $data->id)
                                ->orderBy('created_at', 'desc')
                                ->first();
            $application_form = ApplicationForm::where('id', $data->id)->first();
            $records[] = compact('application_form', 'fee');
        }
       return view('admin.teaching-download-application', compact('records'));
    }
    
    
    public function FMCSProfessor() {
          $datas = ApplicationForm::where('faculty_department', 'Faculty of Mathematics & Computer Science')
                                ->where('position', 'Professor')
                                ->where('application_for', 'Teaching')
                                ->where('paid', '1')
                                ->get();
        $records = [];
        foreach ($datas as $data) {
            $fee = ApplicationFee::where('payment', 'Success')
                                ->where('application_id', $data->id)
                                ->orderBy('created_at', 'desc')
                                ->first();
            $application_form = ApplicationForm::where('id', $data->id)->first();
            $records[] = compact('application_form', 'fee');
        }
       return view('admin.teaching-download-application', compact('records'));
    }

    public function FMCSAssistant() {
        $datas = ApplicationForm::where('faculty_department', 'Faculty of Mathematics & Computer Science')
                                ->where('position', 'Assistant Professor')
                                ->where('application_for', 'Teaching')
                                ->where('paid', '1')
                                ->get();
        $records = [];
        foreach ($datas as $data) {
            $fee = ApplicationFee::where('payment', 'Success')
                                ->where('application_id', $data->id)
                                ->orderBy('created_at', 'desc')
                                ->first();
            $application_form = ApplicationForm::where('id', $data->id)->first();
            $records[] = compact('application_form', 'fee');
        }
       return view('admin.teaching-download-application', compact('records'));
    }

    public function FMCSAssociate() {
         $datas = ApplicationForm::where('faculty_department', 'Faculty of Mathematics & Computer Science')
                                ->where('position', 'Associate Professor')
                                ->where('application_for', 'Teaching')
                                ->where('paid', '1')
                                ->get();
        $records = [];
        foreach ($datas as $data) {
            $fee = ApplicationFee::where('payment', 'Success')
                                ->where('application_id', $data->id)
                                ->orderBy('created_at', 'desc')
                                ->first();
            $application_form = ApplicationForm::where('id', $data->id)->first();
            $records[] = compact('application_form', 'fee');
        }
       return view('admin.teaching-download-application', compact('records'));
    }



    public function FLSBAssistant() {
        $datas = ApplicationForm::where('faculty_department', 'Faculty of Life Sciences & Biotechnology')
                                ->where('position', 'Assistant Professor')
                                ->where('application_for', 'Teaching')
                                ->where('paid', '1')
                                ->get();
        $records = [];
        foreach ($datas as $data) {
            $fee = ApplicationFee::where('payment', 'Success')
                                ->where('application_id', $data->id)
                                ->orderBy('created_at', 'desc')
                                ->first();
            $application_form = ApplicationForm::where('id', $data->id)->first();
            $records[] = compact('application_form', 'fee');
        }
       return view('admin.teaching-download-application', compact('records'));
    }

    public function MathematicsAssistant() {
        $datas = ApplicationForm::where('faculty_department', 'Department of Mathematics')
                                ->where('position', 'Assistant Professor')
                                ->where('application_for', 'Teaching')
                                ->where('paid', '1')
                                ->get();
        $records = [];
        foreach ($datas as $data) {
            $fee = ApplicationFee::where('payment', 'Success')
                                ->where('application_id', $data->id)
                                ->orderBy('created_at', 'desc')
                                ->first();
            $application_form = ApplicationForm::where('id', $data->id)->first();
            $records[] = compact('application_form', 'fee');
        }
       return view('admin.teaching-download-application', compact('records'));
    }

    public function ManagementProfessor() {
        $datas = ApplicationForm::where('faculty_department', 'Faculty of Management')
                                ->where('position', 'Professor')
                                ->where('application_for', 'Teaching')
                                ->where('paid', '1')
                                ->get();
        $records = [];
        foreach ($datas as $data) {
            $fee = ApplicationFee::where('payment', 'Success')
                                ->where('application_id', $data->id)
                                ->orderBy('created_at', 'desc')
                                ->first();
            $application_form = ApplicationForm::where('id', $data->id)->first();
            $records[] = compact('application_form', 'fee');
        }
       return view('admin.teaching-download-application', compact('records'));
    }
    
    public function ManagementAssociate() {
        $datas = ApplicationForm::where('faculty_department', 'Faculty of Management')
                                ->where('position', 'Associate Professor')
                                ->where('application_for', 'Teaching')
                                ->where('paid', '1')
                                ->get();
        $records = [];
        foreach ($datas as $data) {
            $fee = ApplicationFee::where('payment', 'Success')
                                ->where('application_id', $data->id)
                                ->orderBy('created_at', 'desc')
                                ->first();
            $application_form = ApplicationForm::where('id', $data->id)->first();
            $records[] = compact('application_form', 'fee');
        }
       return view('admin.teaching-download-application', compact('records'));
    }

    public function ManagementAssistant() {
        $datas = ApplicationForm::where('faculty_department', 'Faculty of Management')
                                ->where('position', 'Assistant Professor')
                                ->where('application_for', 'Teaching')
                                ->where('paid', '1')
                                ->get();
        $records = [];
        foreach ($datas as $data) {
            $fee = ApplicationFee::where('payment', 'Success')
                                ->where('application_id', $data->id)
                                ->orderBy('created_at', 'desc')
                                ->first();
            $application_form = ApplicationForm::where('id', $data->id)->first();
            $records[] = compact('application_form', 'fee');
        }
       return view('admin.teaching-download-application', compact('records'));
    }


    public function CSEProfessor() {
        $datas = ApplicationForm::where('faculty_department', 'Department of Computer Science')
                                ->where('position', 'Professor')
                                ->where('application_for', 'Teaching')
                                ->where('paid', '1')
                                ->get();
        $records = [];
        foreach ($datas as $data) {
            $fee = ApplicationFee::where('payment', 'Success')
                                ->where('application_id', $data->id)
                                ->orderBy('created_at', 'desc')
                                ->first();
            $application_form = ApplicationForm::where('id', $data->id)->first();
            $records[] = compact('application_form', 'fee');
        }
       return view('admin.teaching-download-application', compact('records'));
    }
    
    public function CSEAssociate() {
        $datas = ApplicationForm::where('faculty_department', 'Department of Computer Science')
                                ->where('position', 'Associate Professor')
                                ->where('application_for', 'Teaching')
                                ->where('paid', '1')
                                ->get();
        $records = [];
        foreach ($datas as $data) {
            $fee = ApplicationFee::where('payment', 'Success')
                                ->where('application_id', $data->id)
                                ->orderBy('created_at', 'desc')
                                ->first();
            $application_form = ApplicationForm::where('id', $data->id)->first();
            $records[] = compact('application_form', 'fee');
        }
       return view('admin.teaching-download-application', compact('records'));
    }

    public function CSEAssistant() {
        $datas = ApplicationForm::where('faculty_department', 'Department of Computer Science')
                                ->where('position', 'Assistant Professor')
                                ->where('application_for', 'Teaching')
                                ->where('paid', '1')
                                ->get();
        $records = [];
        foreach ($datas as $data) {
            $fee = ApplicationFee::where('payment', 'Success')
                                ->where('application_id', $data->id)
                                ->orderBy('created_at', 'desc')
                                ->first();
            $application_form = ApplicationForm::where('id', $data->id)->first();
            $records[] = compact('application_form', 'fee');
        }
       return view('admin.teaching-download-application', compact('records'));
    }

    public function EnglishAssistant() {
        $datas = ApplicationForm::where('faculty_department', 'English')
                                ->where('position', 'Assistant Professor')
                                ->where('application_for', 'Teaching')
                                ->where('paid', '1')
                                ->get();
        $records = [];
        foreach ($datas as $data) {
            $fee = ApplicationFee::where('payment', 'Success')
                                ->where('application_id', $data->id)
                                ->orderBy('created_at', 'desc')
                                ->first();
            $application_form = ApplicationForm::where('id', $data->id)->first();
            $records[] = compact('application_form', 'fee');
        }
       return view('admin.teaching-download-application', compact('records'));
    }


    public function PhysicsAssociate() {
        $datas = ApplicationForm::where('faculty_department', 'Physics')
                                ->where('position', 'Associate Professor')
                                ->where('application_for', 'Teaching')
                                ->where('paid', '1')
                                ->get();
        $records = [];
        foreach ($datas as $data) {
            $fee = ApplicationFee::where('payment', 'Success')
                                ->where('application_id', $data->id)
                                ->orderBy('created_at', 'desc')
                                ->first();
            $application_form = ApplicationForm::where('id', $data->id)->first();
            $records[] = compact('application_form', 'fee');
        }
       return view('admin.teaching-download-application', compact('records'));
    }

    public function PhysicsAssistant() {
        $datas = ApplicationForm::where('faculty_department', 'Physics')
                                ->where('position', 'Assistant Professor')
                                ->where('application_for', 'Teaching')
                                ->where('paid', '1')
                                ->get();
        $records = [];
        foreach ($datas as $data) {
            $fee = ApplicationFee::where('payment', 'Success')
                                ->where('application_id', $data->id)
                                ->orderBy('created_at', 'desc')
                                ->first();
            $application_form = ApplicationForm::where('id', $data->id)->first();
            $records[] = compact('application_form', 'fee');
        }
       return view('admin.teaching-download-application', compact('records'));
    }

    public function ClimateAssociate() {
        $datas = ApplicationForm::where('faculty_department', 'Climate Change')
                                ->where('position', 'Associate Professor')
                                ->where('application_for', 'Teaching')
                                ->where('paid', '1')
                                ->get();
        $records = [];
        foreach ($datas as $data) {
            $fee = ApplicationFee::where('payment', 'Success')
                                ->where('application_id', $data->id)
                                ->orderBy('created_at', 'desc')
                                ->first();
            $application_form = ApplicationForm::where('id', $data->id)->first();
            $records[] = compact('application_form', 'fee');
        }
       return view('admin.teaching-download-application', compact('records'));
    }

    public function ClimateAssistant() {
        $datas = ApplicationForm::where('faculty_department', 'Climate Change')
                                ->where('position', 'Assistant Professor')
                                ->where('application_for', 'Teaching')
                                ->where('paid', '1')
                                ->get();
        $records = [];
        foreach ($datas as $data) {
            $fee = ApplicationFee::where('payment', 'Success')
                                ->where('application_id', $data->id)
                                ->orderBy('created_at', 'desc')
                                ->first();
            $application_form = ApplicationForm::where('id', $data->id)->first();
            $records[] = compact('application_form', 'fee');
        }
       return view('admin.teaching-download-application', compact('records'));
    }

    public function ChemistryAssistant() {
        $datas = ApplicationForm::where('faculty_department', 'Chemistry')
                                ->where('position', 'Assistant Professor')
                                ->where('application_for', 'Teaching')
                                ->where('paid', '1')
                                ->get();
        $records = [];
        foreach ($datas as $data) {
            $fee = ApplicationFee::where('payment', 'Success')
                                ->where('application_id', $data->id)
                                ->orderBy('created_at', 'desc')
                                ->first();
            $application_form = ApplicationForm::where('id', $data->id)->first();
            $records[] = compact('application_form', 'fee');
        }
       return view('admin.teaching-download-application', compact('records'));
    }

    public function ElectronicsEngAssistant() {
        $datas = ApplicationForm::where('faculty_department', 'Electronics Engineering')
                                ->where('position', 'Assistant Professor')
                                ->where('application_for', 'Teaching')
                                ->where('paid', '1')
                                ->get();
        $records = [];
        foreach ($datas as $data) {
            $fee = ApplicationFee::where('payment', 'Success')
                                ->where('application_id', $data->id)
                                ->orderBy('created_at', 'desc')
                                ->first();
            $application_form = ApplicationForm::where('id', $data->id)->first();
            $records[] = compact('application_form', 'fee');
        }
       return view('admin.teaching-download-application', compact('records'));
    }


    /**************************Non Teaching *********************** */


public function dirVirCampus() {
    $datas = ApplicationForm::where('faculty_department', 'Virtual Campus')
                            ->where('position', 'Director')
                            ->where('application_for', 'Non-Teaching')
                            ->where('paid', '1')
                            ->where('selected', '1')
                            ->get();

    $records = []; // Store data for all records

    foreach ($datas as $data) {
        // Fetch related fee information
        $fee = ApplicationFee::where('payment', 'Success')
                            ->where('application_id', $data->id)
                            ->orderBy('created_at', 'desc')
                            ->first();

        // Fetch application form details
        $application_form = ApplicationForm::where('id', $data->id)->first();

        // Store the data for rendering
        $records[] = compact('application_form', 'fee');
    }

    // Pass all records to the view
    return view('admin.download-application', compact('records'));
}

public function dirTrain() {
    $datas = ApplicationForm::where('faculty_department', 'Training & Placement')
                            ->where('position', 'Director')
                            ->where('application_for', 'Non-Teaching')
                            ->where('paid', '1')
                            ->where('selected', '1')
                            ->get();

    $records = []; // Store data for all records

    foreach ($datas as $data) {
        // Fetch related fee information
        $fee = ApplicationFee::where('payment', 'Success')
                            ->where('application_id', $data->id)
                            ->orderBy('created_at', 'desc')
                            ->first();

        // Fetch application form details
        $application_form = ApplicationForm::where('id', $data->id)->first();

        // Store the data for rendering
        $records[] = compact('application_form', 'fee');
    }

    // Pass all records to the view
    return view('admin.download-application', compact('records'));
}


    public function dirMedia() {
        $datas = ApplicationForm::where('faculty_department', 'Media & PR')
                                ->where('position', 'Director')
                                ->where('application_for', 'Non-Teaching')
                                ->where('paid', '1')
                                ->where('selected', '1')
                                ->get();

        $records = []; // Store data for all records

        foreach ($datas as $data) {
            // Fetch related fee information
            $fee = ApplicationFee::where('payment', 'Success')
                                ->where('application_id', $data->id)
                                ->orderBy('created_at', 'desc')
                                ->first();

            // Fetch application form details
            $application_form = ApplicationForm::where('id', $data->id)->first();

            // Store the data for rendering
            $records[] = compact('application_form', 'fee');
        }

        // Pass all records to the view
        return view('admin.download-application', compact('records'));
    }





    public function dirICT() {
        $datas = ApplicationForm::where('faculty_department', 'ICT')
                                ->where('position', 'Director')
                                ->where('application_for', 'Non-Teaching')
                                ->where('paid', '1')
                                ->where('selected', '1')
                                ->get();

        $records = []; // Store data for all records

        foreach ($datas as $data) {
            // Fetch related fee information
            $fee = ApplicationFee::where('payment', 'Success')
                                ->where('application_id', $data->id)
                                ->orderBy('created_at', 'desc')
                                ->first();

            // Fetch application form details
            $application_form = ApplicationForm::where('id', $data->id)->first();

            // Store the data for rendering
            $records[] = compact('application_form', 'fee');
        }

        // Pass all records to the view
        return view('admin.download-application', compact('records'));
    }

    public function ddTrain() {
        $datas = ApplicationForm::where('faculty_department', 'Training & Placement')
                                ->where('position', 'Deputy Director')
                                ->where('application_for', 'Non-Teaching')
                                ->where('paid', '1')
                                ->where('selected', '1')
                                ->get();
    
        $records = [];
        foreach ($datas as $data) {
            $fee = ApplicationFee::where('payment', 'Success')
                                 ->where('application_id', $data->id)
                                 ->orderBy('created_at', 'desc')
                                 ->first();
    
            $application_form = ApplicationForm::where('id', $data->id)->first();
            $records[] = compact('application_form', 'fee');
        }
        return view('admin.download-application', compact('records'));
    }



    public function ddMedia() {
        $datas = ApplicationForm::where('faculty_department', 'Media & PR')
                                ->where('position', 'Deputy Director')
                                ->where('application_for', 'Non-Teaching')
                                ->where('paid', '1')
                                ->where('selected', '1')
                                ->get();
    
        $records = []; // Store data for all records
    
        foreach ($datas as $data) {
            // Fetch related fee information
            $fee = ApplicationFee::where('payment', 'Success')
                                 ->where('application_id', $data->id)
                                 ->orderBy('created_at', 'desc')
                                 ->first();
    
            // Fetch application form details
            $application_form = ApplicationForm::where('id', $data->id)->first();
    
            // Store the data for rendering
            $records[] = compact('application_form', 'fee');
        }
    
        // Pass all records to the view
        return view('admin.download-application', compact('records'));
    }

    public function ddICT() {
        $datas = ApplicationForm::where('faculty_department', 'ICT')
                                ->where('position', 'Deputy Director')
                                ->where('application_for', 'Non-Teaching')
                                ->where('paid', '1')
                                ->where('selected', '1')
                                ->get();
    
        $records = []; // Store data for all records
    
        foreach ($datas as $data) {
            // Fetch related fee information
            $fee = ApplicationFee::where('payment', 'Success')
                                 ->where('application_id', $data->id)
                                 ->orderBy('created_at', 'desc')
                                 ->first();
    
            // Fetch application form details
            $application_form = ApplicationForm::where('id', $data->id)->first();
    
            // Store the data for rendering
            $records[] = compact('application_form', 'fee');
        }
    
        // Pass all records to the view
        return view('admin.download-application', compact('records'));
    }

    public function ddVirCampus() {
        $datas = ApplicationForm::where('faculty_department', 'Virtual Campus')
                                ->where('position', 'Deputy Director')
                                ->where('application_for', 'Non-Teaching')
                                ->where('paid', '1')
                                ->where('selected', '1')
                                ->get();
    
        $records = []; // Store data for all records
    
        foreach ($datas as $data) {
            // Fetch related fee information
            $fee = ApplicationFee::where('payment', 'Success')
                                 ->where('application_id', $data->id)
                                 ->orderBy('created_at', 'desc')
                                 ->first();
    
            // Fetch application form details
            $application_form = ApplicationForm::where('id', $data->id)->first();
    
            // Store the data for rendering
            $records[] = compact('application_form', 'fee');
        }
    
        // Pass all records to the view
        return view('admin.download-application', compact('records'));
    }

    
    public function admp() {
        $datas = ApplicationForm::where('faculty_department', 'Media & PR')
                                ->where('position', 'Assistant Director')
                                ->where('application_for', 'Non-Teaching')
                                ->where('paid', '1')
                                ->where('selected', '1')
                                ->get();
    
        $records = []; // Store data for all records
    
        foreach ($datas as $data) {
            // Fetch related fee information
            $fee = ApplicationFee::where('payment', 'Success')
                                 ->where('application_id', $data->id)
                                 ->orderBy('created_at', 'desc')
                                 ->first();
    
            // Fetch application form details
            $application_form = ApplicationForm::where('id', $data->id)->first();
    
            // Store the data for rendering
            $records[] = compact('application_form', 'fee');
        }
    
        // Pass all records to the view
        return view('admin.download-application', compact('records'));
    }

    public function advc() {
        $datas = ApplicationForm::where('faculty_department', 'Virtual Campus')
                                ->where('position', 'Assistant Director')
                                ->where('application_for', 'Non-Teaching')
                                ->where('paid', '1')
                                ->where('selected', '1')
                                ->get();
    
        $records = []; // Store data for all records
    
        foreach ($datas as $data) {
            // Fetch related fee information
            $fee = ApplicationFee::where('payment', 'Success')
                                 ->where('application_id', $data->id)
                                 ->orderBy('created_at', 'desc')
                                 ->first();
    
            // Fetch application form details
            $application_form = ApplicationForm::where('id', $data->id)->first();
    
            // Store the data for rendering
            $records[] = compact('application_form', 'fee');
        }
    
        // Pass all records to the view
        return view('admin.download-application', compact('records'));
    }
    
    public function adict() {
        $datas = ApplicationForm::where('faculty_department', 'ICT')
                                ->where('position', 'Assistant Director')
                                ->where('application_for', 'Non-Teaching')
                                ->where('paid', '1')
                                ->where('selected', '1')
                                ->get();
    
        $records = []; // Store data for all records
    
        foreach ($datas as $data) {
            // Fetch related fee information
            $fee = ApplicationFee::where('payment', 'Success')
                                 ->where('application_id', $data->id)
                                 ->orderBy('created_at', 'desc')
                                 ->first();
    
            // Fetch application form details
            $application_form = ApplicationForm::where('id', $data->id)->first();
    
            // Store the data for rendering
            $records[] = compact('application_form', 'fee');
        }
    
        // Pass all records to the view
        return view('admin.download-application', compact('records'));
    }
    
    public function adTrain() {
        $datas = ApplicationForm::where('faculty_department', 'Training & Placement')
                                ->where('position', 'Assistant Director')
                                ->where('application_for', 'Non-Teaching')
                                ->where('paid', '1')
                                ->where('selected', '1')
                                ->get();
    
        $records = []; // Store data for all records
    
        foreach ($datas as $data) {
            // Fetch related fee information
            $fee = ApplicationFee::where('payment', 'Success')
                                 ->where('application_id', $data->id)
                                 ->orderBy('created_at', 'desc')
                                 ->first();
    
            // Fetch application form details
            $application_form = ApplicationForm::where('id', $data->id)->first();
    
            // Store the data for rendering
            $records[] = compact('application_form', 'fee');
        }
    
        // Pass all records to the view
        return view('admin.download-application', compact('records'));
    }
    
    

    
    
    
    
    
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


        $assistantDirectorPaid = DB::table('application_forms')->where('position', 'Assistant Director')->where('paid', 1)->count();
        $assistantDirectorUnpaid = DB::table('application_forms')->where('position', 'Assistant Director')->where('paid','!=' ,1)->count();


        $assistantDirectorPaid = DB::table('application_forms')->where('position', 'Associate Professor')->where('paid', 1)->count();
        $assistantDirectorUnpaid = DB::table('application_forms')->where('position', 'Associate Professor')->where('paid','!=' ,1)->count();



        $info   =  compact(
            'assistantDirectorPaid',
            'assistantDirectorUnpaid',
        );
        return view('admin/' . '.dashboard')->with($info);
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

}
