<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function processUpload(Request $request)
    {
        if ($request->hasFile('filepond')) {
            $file = $request->file('filepond');
            $filePath = $file->store('uploads', 'public'); // Store the file in public storage

            return response()->json(['filePath' => $filePath, 'success' => true]);
        }

        return response()->json(['error' => 'No file uploaded.'], 400);
    }
}
