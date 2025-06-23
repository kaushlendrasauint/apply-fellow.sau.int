<?php

namespace App\Http\Controllers;

use App\Models\TaughtCourses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TaughtCoursesController extends Controller
{
    public function save(Request $request)
    {
        $request->validate([
            'type' => 'required|string|in:courses_taught,compulsory_courses,optional_courses,other_courses,best_Publications',
            'value' => 'required|string',
        ]);

        $applicationId = Session::get('user')->id;

        TaughtCourses::create([
            'application_id' => $applicationId,
            'type' => $request->type,
            'value' => $request->value,
        ]);

        return back()->with('success', 'Course added successfully!');
    }

        public function destroy($id)
        {
            try {
                $course = TaughtCourses::findOrFail($id);
                $course->delete();

                return redirect()->back()->with('success', 'Course deleted successfully.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Failed to delete the course: ' . $e->getMessage());
            }
        }

}
