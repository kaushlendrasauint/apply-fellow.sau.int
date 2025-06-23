<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\DocumentUpload;
use DB;
use Session;

class UploadDocumentsControllerer extends Controller
{
    public function __construct()
    {
        if (Session::has('user') && is_object(Session::get('user'))) {
            $this->userId = Session::get('user')->id;
        } else {
            $this->userId = null; // Set to null or handle unauthorized users
        }
    }

    public function index(){

       
        $birth_certification  = DocumentUpload::where('application_id', Auth::id())->where('document_type', 'birth_certification')->value('document_path');
        $resume  = DocumentUpload::where('application_id', Auth::id())->where('document_type', 'resume')->value('document_path');
        $passport_photograph  = DocumentUpload::where('application_id', Auth::id())->where('document_type', 'passport_photograph')->value('document_path');
        $bachelors_degrees  = DocumentUpload::where('application_id', Auth::id())->where('document_type', 'bachelors_degrees')->value('document_path');
        $masters_degrees  = DocumentUpload::where('application_id', Auth::id())->where('document_type', 'masters_degrees')->value('document_path');
        $PhD_degrees  = DocumentUpload::where('application_id', Auth::id())->where('document_type', 'PhD_degrees')->value('document_path');

        return view('web.file-upload',compact('birth_certification','resume','birth_certification','passport_photograph','bachelors_degrees','masters_degrees','PhD_degrees'));
    }

    
    public function next(Request $request)
    {
        $userId = Auth::id();
        $programmes = Programme::where('application_id', $userId)->first();
       
        $photo_identity = DocumentUpload::where('application_id', $userId)->where('document_type', 'photo_identity')->value('document_path');
        $passport_photograph = DocumentUpload::where('application_id', $userId)->where('document_type', 'passport_photograph')->value('document_path');
        $signatures = DocumentUpload::where('application_id', $userId)->where('document_type', 'signatures')->value('document_path');
        $tenth_marksheet_certificate = DocumentUpload::where('application_id', $userId)->where('document_type', 'tenth_marksheet_certificate')->value('document_path');
        $twelfth_marksheet_certificate = DocumentUpload::where('application_id', $userId)->where('document_type', 'twelfth_marksheet_certificate')->value('document_path');
        $bachelors_marksheet_certificate = DocumentUpload::where('application_id', $userId)->where('document_type', 'bachelors_marksheet_certificate')->value('document_path');
        $master_marksheet_certificate = DocumentUpload::where('application_id', $userId)->where('document_type', 'master_marksheet_certificate')->value('document_path');
        $Proposed_research_plan_Area_of_interest = DocumentUpload::where('application_id', $userId)->where('document_type', 'Proposed_research_plan_Area_of_interest')->value('document_path');
        $short_cv = DocumentUpload::where('application_id', $userId)->where('document_type', 'short_cv')->value('document_path');
       

        if (!$photo_identity) {
            return redirect()->back()->with('error', 'Photo identity document is required.');
        }
        
        if (!$passport_photograph) {
            return redirect()->back()->with('error', 'Passport size photograph document is required.');
        }
       
        if (!$signatures) {
            return redirect()->back()->with('error', 'Signatures document is required.');
        }
       
        if (!$tenth_marksheet_certificate) {
            return redirect()->back()->with('error', '10th Marksheet Certificate document is required.');
        }

        if($programmes->programme == 'bachelors'){
            
            if (!$twelfth_marksheet_certificate) {
                 return redirect()->back()->with('error', '12th Marksheet Certificate document is required.In case the result of your qualifying exam is awaited, you can upload the Grade Sheets or Marksheets upto the last Semester/Year.');
             }
        }
        
        if($programmes->programme == 'masters'){
             if (!$twelfth_marksheet_certificate) {
                 return redirect()->back()->with('error', '12th Marksheet Certificate document is required.');
             }
             if (!$bachelors_marksheet_certificate) {
                 return redirect()->back()->with('error', 'Bachelors Marksheet Certificate document is required.In case the result of your qualifying exam is awaited, you can upload the Grade Sheets or Marksheets upto the last Semester/Year.');
             }
        }


        if($programmes->programme == 'phd'){
             if (!$twelfth_marksheet_certificate) {
                 return redirect()->back()->with('error', '12th Marksheet Certificate document is required.');
             }
             if (!$bachelors_marksheet_certificate) {
                 return redirect()->back()->with('error', 'Bachelors Marksheet Certificate document is required.');
             }
             if (!$master_marksheet_certificate) {
                 return redirect()->back()->with('error', 'Master Marksheet Certificate document is required.In case the result of your qualifying exam is awaited, you can upload the Grade Sheets or Marksheets upto the last Semester/Year.');
             }
             if (!$short_cv) {
                 return redirect()->back()->with('error', 'Short CV document is required.');
             }
        }
        
        if($programmes->programme == 'executivePhd'){
            if (!$twelfth_marksheet_certificate) {
                 return redirect()->back()->with('error', '12th Marksheet Certificate document is required.');
             }
              if (!$bachelors_marksheet_certificate) {
                 return redirect()->back()->with('error', 'Bachelors Marksheet Certificate document is required.');
             }
             if (!$master_marksheet_certificate) {
                 return redirect()->back()->with('error', 'Master Marksheet Certificate document is required.');
             }
             if (!$Proposed_research_plan_Area_of_interest) {
                 return redirect()->back()->with('error', 'Proposed Research Plan Area of Interest Certificate document is required.');
             }
             if (!$short_cv) {
                 return redirect()->back()->with('error', 'Short CV document is required.');
             }
        }
    
       
        $stepStatus = StepStatus::where('application_id', $userId)->first();
    
        if ($stepStatus) {
            $stepStatus->update([
                'upload_documents' => true
            ]);
        } else {
            return redirect()->back()->with('error', 'Step status record not found. Please try again.');
        }
    
        return redirect()->route('index.preview')->with('success', 'All documents have been uploaded successfully!');

    }



public function upload(Request $request)
{   
     $allowedMimes = [
        'jpeg','jpg','pdf'            
    ];
   
    $request->validate([
        'document' => 'nullable|file|max:512|mimes:' . implode(',', $allowedMimes),
        'document_type' => 'nullable|string',
    ], [
        'document.required' => 'Please upload a document.',
        'document.file' => 'The uploaded file must be a valid file.',
        'document.max' => 'The file size must not exceed 512 KB.',
        'document.mimes' => 'The file must be in JPEG, PDF, or JPG format.',
        'document_type.required' => 'Document type is required.',
        'document_type.string' => 'Document type must be a valid string.',
    ]);

    try {
        // Save the uploaded file
        $file = $request->file('document');
      
        $destinationPath = storage_path('app/public/uploads/documents');
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($destinationPath, $fileName);
        $filePath = 'uploads/documents/' . $fileName;

        // Delete the old document if it exists
        DocumentUpload::where('document_type', $request->document_type)
            ->where('application_id', $this->userId)
            ->delete();

        // Save the new document
        DocumentUpload::create([
            'document_type' => $request->document_type,
            'document_path' => $filePath,
            'application_id' => $this->userId,
        ]);

        return back()->with('success', 'The document has been uploaded successfully.');
    } catch (\Exception $e) {
        return back()->with('error', 'An error occurred: ' . $e->getMessage());
    }
}


    

    // Handle update
    public function update(Request $request, $id)
    {
        $request->validate([
            'document' => 'nullable|file|max:512|mimes:jpeg,png,jpg,pdf',
        ]);

        try {
            $document = DocumentUpload::findOrFail($id);

            // Delete old file
            if ($document->document_path && \Storage::disk('public')->exists($document->document_path)) {
                \Storage::disk('public')->delete($document->document_path);
            }

            // Save the new file
            $file = $request->file('document');
            $filePath = $file->store('uploads/documents', 'public');

            // Update the database record
            $document->update(['document_path' => $filePath]);

            return back()->with('success', 'Your document has been updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
