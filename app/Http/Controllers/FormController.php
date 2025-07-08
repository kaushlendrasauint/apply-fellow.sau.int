<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ApplicationForm;
use App\Models\ApplicationFee;
use App\Models\TaughtCourses;
use App\Models\DocumentUpload;
use App\Models\Career;
use App\Models\PhdDetail;
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



class FormController extends Controller
{
    public function __construct()
    {
        if (Session::has('user') && is_object(Session::get('user'))) {
            $this->userId = Session::get('user')->id;
        } else {
            $this->userId = null; // Set to null or handle unauthorized users
        }
    }

   function isCompleted()
    {
        $data = ApplicationForm::find($this->userId);
        if ($data && $data->is_complete == 1) {
            return redirect()->to('/success');
        }
        return null;
    }


    function step()
    {
        $redirect = $this->isCompleted();
        if ($redirect) {
            return $redirect;
        }

        $data = ApplicationForm::find($this->userId);
        $info = compact('data');
        return view('step')->with($info);
    }


    public function insertStep(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'application_for' => 'required|string',
            ]);

            $applicationId = Session::get('user')->id;
            $application = ApplicationForm::findOrFail($applicationId);
            $application->update($validatedData);

            $encryptedId = base64_encode(Crypt::encryptString($application->id));


            return response()->json(['success' => 'Application saved successfully!', 'url' => 'step1'], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            \Log::error('Application submission failed: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while submitting the application. Please try again.'], 500);
        }
    }

    function coming_soon()
    {
        $id = Session::get('user')->id;
        $this->isCompleted();
        $data = ApplicationForm::find($id);
        $info = compact('data');
        return view('coming_soon')->with($info);
    }


    function step1()
    {
        $redirect = $this->isCompleted();
        if ($redirect) {
            return $redirect;
        }

        $data = ApplicationForm::find($this->userId);
        $info = compact('data');
        return view('step1')->with($info);
    }

    public function insertStep1(Request $request)
    {
         
        try {
            $validatedData = $request->validate([
                'position' => 'required|string',
                'faculty_department' => 'required|string',
                'name' => 'required|string|max:100',
                'gender' => 'required|string',
                'spouse_name' => 'nullable|string',
                'nationality' => 'required|string',
               'dob' => ['required','date','before_or_equal:' . now()->subYears(20)->format('Y-m-d'),],
                'email' => 'required|email',
                'mobile' => ['required', 'string', 'regex:/^\d{10,15}$/'],
                'position_current_held' => 'required|string',
                'position_currenty' => 'required|string',
                'work_address' => 'required|string|max:200',
                'permanent_address' => 'required|string|max:200',
                'correspondence_address' => 'required|string',
                'doctoral_degree' => 'required|string',
                'doctoral_university' => 'required|string',              
               'doctoral_joining' => 'required|date|before_or_equal:doctoral_award',
                'doctoral_award' => 'required|date',
                'bachelor_joining' => 'required|date|before_or_equal:bachelor_award',
                'bachelor_award' => 'required|date',
                'master_joining' => 'required|date|before_or_equal:master_award',
                'master_award' => 'required|date',
                'school_joining' => 'required|date|before_or_equal:school_award',
                'school_award' => 'required|date',              
                'master_degree' => 'required|string',
                'master_university' => 'required|string',                
                'bachelor_degree' => 'required|string',
                'bachelor_university' => 'required|string',             
                'school_degree' => 'required|string',
                'school_university' => 'required|string',
                'others_joining' => 'nullable|string',
                'others_award' => 'nullable|string',              
                'others_university' => 'nullable|string',
                'others_degree' => 'nullable|string',
                

                'doctoral_grades' => 'required|string|max:4',
                'master_grades' => ['required', 'numeric', 'regex:/^(\d{1,2}(\.\d{1,2})?|100(\.0{1,2})?)$/'],
                'bachelor_grades' => ['required', 'numeric', 'regex:/^(\d{1,2}(\.\d{1,2})?|100(\.0{1,2})?)$/'],
                'school_grades' => ['required', 'numeric', 'regex:/^(\d{1,2}(\.\d{1,2})?|100(\.0{1,2})?)$/'],
                'others_grades' =>  ['nullable', 'numeric', 'regex:/^(\d{1,2}(\.\d{1,2})?|100(\.0{1,2})?)$/'],

                'name_phd_thesis' => 'required|string|max:200',
                'supervisor' => 'required|string|max:100',
                'step' => 'required',
                'education' => 'nullable|array',
            ]);

            $applicationId = Session::get('user')->id;
            $application = ApplicationForm::findOrFail($applicationId);
           
            $application->update($validatedData);

            $encryptedId = base64_encode(Crypt::encryptString($application->id));
            return redirect()->route('step2', ['id' => $encryptedId])->with('success', 'Application saved successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            \Log::error('Application submission failed: ' . $e->getMessage());
            return back()->with('error', 'An error occurred while submitting the application. Please try again.')->withInput();
        }
    }


    public function step2($id)
    {   
        $encryptedId = $id;
        $id = Crypt::decryptString(base64_decode($id));

        $redirect = $this->isCompleted();
        if ($redirect) {
            return $redirect;
        }

        $data = ApplicationForm::find($id);
        $phd_details = PhdDetail::where('application_id', $id)->get();
        $careers = Career::where('application_id', $id)->get();

        $courses_taughts = TaughtCourses::where('type', 'courses_taught')->where('application_id', $id)->get();
        $compulsory_courses = TaughtCourses::where('type', 'compulsory_courses')->where('application_id', $id)->get();
        $optional_courses = TaughtCourses::where('type', 'optional_courses')->where('application_id', $id)->get();
        $other_courses = TaughtCourses::where('type', 'other_courses')->where('application_id', $id)->get();
       

        return view('step2', compact('phd_details', 'encryptedId', 'data', 'careers', 'courses_taughts', 'compulsory_courses', 'optional_courses', 'other_courses'));
    }

    public function updateCareer(Request $request)
        {
            // Validate the incoming request
            $rules = [];
            $messages = [];

            if (!empty($request->career_position)) {
                foreach ($request->career_position as $index => $position) {
                    // Define validation rules for each career entry
                    $rules["career_position.{$index}"] = 'required|string|max:255';
                    $rules["career_employer.{$index}"] = 'required|string|max:255';
                    $rules["career_address.{$index}"] = 'required|string|max:500';
                    $rules["career_datefrom.{$index}"] = 'required|date|before_or_equal:career_dateTo.' . $index;
                    $rules["career_dateTo.{$index}"] = 'required|date|after_or_equal:career_datefrom.' . $index;
                    $rules["career_salary.{$index}"] = 'required|numeric|min:0|max:50000';

                    // Custom error messages
                    $messages["career_position.{$index}.required"] = "Position for career entry " . ($index + 1) . " is required.";
                    $messages["career_employer.{$index}.required"] = "Employer for career entry " . ($index + 1) . " is required.";
                    $messages["career_address.{$index}.required"] = "Address for career entry " . ($index + 1) . " is required.";
                    $messages["career_datefrom.{$index}.required"] = "Start date for career entry " . ($index + 1) . " is required.";
                    $messages["career_datefrom.{$index}.before_or_equal"] = "Start date for career entry " . ($index + 1) . " must be on or before the end date.";
                    $messages["career_dateTo.{$index}.required"] = "End date for career entry " . ($index + 1) . " is required.";
                    $messages["career_dateTo.{$index}.after_or_equal"] = "End date for career entry " . ($index + 1) . " must be on or after the start date.";
                    $messages["career_salary.{$index}.required"] = "Salary for career entry " . ($index + 1) . " is required.";
                    $messages["career_salary.{$index}.numeric"] = "Salary for career entry " . ($index + 1) . " must be a number.";
                    $messages["career_salary.{$index}.min"] = "Salary for career entry " . ($index + 1) . " must be a positive number.";
                    $messages["career_salary.{$index}.max"] = "Salary for career entry " . ($index + 1) . " cannot exceed 50,000.";
                }

                // Perform validation
                $request->validate($rules, $messages);

                // If validation passes, proceed with updating the career details
                Career::where('application_id', $this->userId)->delete();

                foreach ($request->career_position as $index => $position) {
                    Career::create([
                        'application_id' => $this->userId,
                        'career_position' => $request->career_position[$index],
                        'career_employer' => $request->career_employer[$index],
                        'career_address' => $request->career_address[$index],
                        'career_datefrom' => $request->career_datefrom[$index],
                        'career_dateTo' => $request->career_dateTo[$index],
                        'career_salary' => $request->career_salary[$index],
                    ]);
                }
            } else {
                // Ensure at least one career entry is provided
                $request->validate([
                    'career_position' => 'required|array|min:1',
                ], [
                    'career_position.required' => 'At least one career entry is required.',
                    'career_position.min' => 'At least one career entry is required.',
                ]);
            }

            // Encrypt and redirect
            $encryptedId = base64_encode(Crypt::encryptString($this->userId));
           
            return redirect('/step2/' . $encryptedId)->with('success', 'Updated successfully!');
        }

    public function updateStep2(Request $request)
    {
        $phdDetails = PhdDetail::where('application_id', $this->userId)->count();
        $coursesTaught = TaughtCourses::where('application_id', $this->userId)->where('type', 'courses_taught')->count();
        $compulsoryCourses = TaughtCourses::where('application_id', $this->userId)->where('type', 'compulsory_courses')->count();
        $career = Career::where('application_id', $this->userId)->count();

        // Perform manual validation
        $errors = [];

        if ($phdDetails < 0) {
            $errors['phdDetails'] = 'At least one Ph.D. detail is required.';
        }

        if ($coursesTaught < 1) {
            $errors['coursesTaught'] = 'At least one course taught entry is required.';
        }

        if ($compulsoryCourses < 1) {
            $errors['compulsoryCourses'] = 'At least one compulsory course entry is required.';
        }

        if ($career < 0) {
            $errors['career'] = 'At least one career detail is required.';
        }

       

        if (!empty($errors)) {
            return redirect()->back()->withErrors($errors)->withInput();
        }
        $encryptedId = base64_encode(Crypt::encryptString($this->userId));
        return redirect('/step3/' . $encryptedId)->with('success', 'Updated successfully!');
    }


    public function step3($id)
    {
        $encryptedId = $id;
        $id = Crypt::decryptString(base64_decode($id));
        
        $redirect = $this->isCompleted();
        if ($redirect) {
            return $redirect;
        }

        $data = ApplicationForm::find($id);
        $best_Publications = TaughtCourses::where('type', 'best_Publications')->where('application_id', $id)->get();
        
        return view('step3', compact('encryptedId', 'data','best_Publications'));
    }

    public function updateStep3(Request $request)
    {
        $validatedData = $request->validate([
            'number_books_edited' => 'required|integer',
            'number_books_authored' => 'required|integer',
            'number_research_publications' => 'required|integer',
            'number_book_chapters' => 'required|integer',
            'number_patents' => 'required|integer',
            'number_research_grants' => 'required|integer',
            'number_presentations' => 'required|integer',
        ]);

            $best_Publications = TaughtCourses::where('type', 'best_Publications')->where('application_id', $this->userId)->get();

            if ($best_Publications->count() < 1) {
                throw \Illuminate\Validation\ValidationException::withMessages([
                    'best_Publications' => 'At least one best publication is required.',
                ]);
            }

        try {
            $applicationId = Crypt::decryptString(base64_decode($request->form_id));
            $application = ApplicationForm::findOrFail($applicationId);
            $validatedData['step'] = 3;
            $application->update($validatedData);
            return redirect()->route('step4', ['id' => $request->form_id])->with('success', 'Updated successfully!');
        } catch (\Exception $e) {
            \Log::error('Update failed: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while updating.'], 500);
        }
    }


    public function step4($id)
    {
        $encryptedId = $id;
        $id = Crypt::decryptString(base64_decode($id));

        $redirect = $this->isCompleted();
        if ($redirect) {
            return $redirect;
        }

        $data = ApplicationForm::find($id);
        $application_id = DocumentUpload::where('application_id', $id);

        $covering_letter = DocumentUpload::where('application_id', $id)->where('document_type', 'covering_letter')->value('document_path');
        $birth_certification = DocumentUpload::where('application_id', $id)->where('document_type', 'birth_certification')->value('document_path');
        $passport_photograph = DocumentUpload::where('application_id', $id)->where('document_type', 'passport_photograph')->value('document_path');
        $resume = DocumentUpload::where('application_id', $id)->where('document_type', 'resume')->value('document_path');
        $bachelors_degrees = DocumentUpload::where('application_id', $id)->where('document_type', 'bachelors_degrees')->value('document_path');
        $masters_degrees = DocumentUpload::where('application_id', $id)->where('document_type', 'masters_degrees')->value('document_path');
        $PhD_degrees = DocumentUpload::where('application_id', $id)->where('document_type', 'PhD_degrees')->value('document_path');
      
        return view('step4', compact('encryptedId', 'data', 'application_id',
            'covering_letter', 'birth_certification', 'passport_photograph', 'resume',
            'bachelors_degrees', 'masters_degrees', 'PhD_degrees'));
    }

   
    public function step5(Request $request, $id)
    {
        $this->isCompleted();
        // Decrypt application ID
        $encryptedId = $id;
        $id = Crypt::decryptString(base64_decode($id));

        // Validate required documents
        $requiredDocuments = [
            'covering_letter' => DocumentUpload::where('application_id', $id)->where('document_type', 'covering_letter')->first(),
            'birth_certification' => DocumentUpload::where('application_id', $id)->where('document_type', 'birth_certification')->first(),
            'resume' => DocumentUpload::where('application_id', $id)->where('document_type', 'resume')->first(),
            'passport_photograph' => DocumentUpload::where('application_id', $id)->where('document_type', 'passport_photograph')->first(),
            'bachelors_degrees' => DocumentUpload::where('application_id', $id)->where('document_type', 'bachelors_degrees')->first(),
            'masters_degrees' => DocumentUpload::where('application_id', $id)->where('document_type', 'masters_degrees')->first(),
            'PhD_degrees' => DocumentUpload::where('application_id', $id)->where('document_type', 'PhD_degrees')->first(),
        ];

        foreach ($requiredDocuments as $key => $document) {
            if (!$document) {
                return redirect()->back()->withErrors([
                    'error' => ucfirst(str_replace('_', ' ', $key)) . ' is required.',
                ]);
            }
        }

        

        // Load application form data
        $data = ApplicationForm::find($id);
        
        
        // Return the step5 view with data
        return view('step5', compact('encryptedId', 'data'));
    }

    public function updateStep5(Request $request)
    {
        try {
            $messages = [
                'joining_date.required' => 'The joining date is required.',
                'joining_date.date' => 'The joining date must be a valid date.',
                
                'consider_lower_position.required' => 'Please specify if you would consider a lower position.',
                'consider_lower_position.in' => 'Invalid option for considering a lower position. Choose "yes" or "Not Applicable".',

                'other_information.required' => 'Other information is required.',
                'sau_reasons.required' => 'Please provide reasons for joining SAU.',
                'legal_offences.required' => 'Details about legal offences are required.',
                'health_problems.required' => 'Health problems information is required.',
                'englishProficiency.required' => 'English proficiency level is required.',
                'englishProficiency.in' => 'Invalid English proficiency level. Choose "Excellent", "Very Good", or "Good".',
                'adminExperience.required' => 'Administrative experience details are required.',
                'reason_joining.required' => 'Reason for joining is required.',
            ];

            $validatedData = $request->validate([
                'joining_date' => 'required',
                'consider_lower_position' => 'required|in:yes,Not Applicable',
                'other_information' => 'required|string',
                'sau_reasons' => 'required|string',
                'legal_offences' => 'required|string',
                'health_problems' => 'required|string',
                'englishProficiency' => 'required|in:Excellent,Very Good,Good',
                'adminExperience' => 'required|string',
                'reason_joining' => 'nullable|string|max:255',
            ], $messages);

            $applicationId = Crypt::decryptString(base64_decode($request->form_id));
            $application = ApplicationForm::findOrFail($applicationId);

            $application->update(array_merge(
                $validatedData,
                ['is_complete' => 0,
                'step' => 5]
            ));
          
            return redirect('/preview/' . $request->form_id)->with('success', 'Data updated successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Something went wrong. Please try again.');
        }
    }

    
    public function finalSubmit(Request $request)
    {
        $request->validate([
            'chkConfirm' => 'accepted',
        ], [
            'chkConfirm.accepted' => 'You must confirm to proceed.',
        ]);
    
        ApplicationForm::where('id', $this->userId)->update([
            'is_complete' => 1,
        ]);
        
        return redirect('/thanks')->with('success', 'Data updated successfully.');
    }
  

    public function preview($id)
    {
        $redirect = $this->isCompleted();
        if ($redirect) {
            return $redirect;
        }

        $encryptedId = $id;
        $id = Crypt::decryptString(base64_decode($id));        
        $data = ApplicationForm::find($id);
        $passport_photograph = DocumentUpload::where('application_id',$id)->where('document_type','passport_photograph')->first();
        $document_uploads = DocumentUpload::where('application_id',$id)->get();
        $data = ApplicationForm::find($id);
        $phd_details = PhdDetail::where('application_id',$id)->get();
        $compulsory_courses = TaughtCourses::where('application_id',$id)->where('type','compulsory_courses')->get();
        $optional_courses = TaughtCourses::where('application_id',$id)->where('type','optional_courses')->get();
        $courses_taught = TaughtCourses::where('application_id',$id)->where('type','courses_taught')->get();
        $courses_taughts = TaughtCourses::where('type', 'courses_taught')->where('application_id', $id)->get();
        $other_courses = TaughtCourses::where('type', 'other_courses')->where('application_id', $id)->get();
        $careers = Career::where('application_id', $id)->get();
        $best_Publications = TaughtCourses::where('type', 'best_Publications')->where('application_id', $id)->get();
        $application_form = ApplicationForm::where('id', $id)->first();
        return view('preview', compact('application_form','best_Publications','careers','encryptedId', 'other_courses','courses_taughts','data','document_uploads','passport_photograph','phd_details','compulsory_courses','optional_courses','courses_taught'));
    }


    public function step6($id)
    {
        $redirect = $this->isCompleted();
        if ($redirect) {
            return $redirect;
        }
        
        $encryptedId = $id;
        $id = Crypt::decryptString(base64_decode($id));

        $data = ApplicationForm::find($id);
        return view('step6', compact('encryptedId', 'data'));
    }

    function success()
    {   
        $data = ApplicationForm::find($this->userId);
        $ecrypted = base64_encode(Crypt::encryptString($this->userId));
        return view('success', compact('data','ecrypted'));
    }


    public function downloadApplicationPdf($id)
    {
        $id = Crypt::decryptString(base64_decode($id));
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

    public function logout()
    {
        session(['user' => '']);
        return redirect('/');
    }

    public function sendApplicationSubmittedEmail()
    {
        $application_forms = ApplicationForm::where('paid', 1)
            ->where('id', '>', 866)
            ->get();

        foreach ($application_forms as $application_form) {
            $email = $application_form->email;
            $name = $application_form->name;
            $post = $application_form->position;
            $ecrypted = base64_encode(Crypt::encryptString($application_form->id));
            $application_link = 'https://apply.sau.int/download-application/' . $ecrypted;
            $applicationDetails = [
                'name' => $name,
                'post' => $post,
                'application_link' => $application_link
            ];

            Mail::to($email)->send(new ApplicationSubmittedMail($applicationDetails));
            echo $application_form->id . '<br>';
        }
    }


    
}