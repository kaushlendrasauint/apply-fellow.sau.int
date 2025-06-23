<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhdDetail;
use Session;

class PhdDetailsController extends Controller
{
    public function __construct()
    {
        if (Session::has('user') && is_object(Session::get('user'))) {
            $this->userId = Session::get('user')->id;
        } else {
            $this->userId = null; // Set to null or handle unauthorized users
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required|string|max:100',
            'phd_year' => ['required', 'regex:/^\d{4}$/'],
            'university' => 'required|string|max:100',
            'supervisors' => 'required|string|max:100',
            'thesis_title' => 'required|string|max:255',
        ]);

      
        // Include application_id when creating the record
        PhdDetail::create([
            'student_name' => $request->student_name,
            'phd_year' => $request->phd_year,
            'university' => $request->university,
            'supervisors' => $request->supervisors,
            'thesis_title' => $request->thesis_title,
            'application_id' => $this->userId,
        ]);

        return redirect()->back()->with('success', 'Ph.D details saved successfully!');
    }

    public function destroy($id)
        {
            PhdDetail::findOrFail($id)->delete();
            return redirect()->back()->with('success', 'Deleted successfully.');
        }

}     
