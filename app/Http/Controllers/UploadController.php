<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\File;

class UploadController extends Controller
{
    public function showUploadForm()
    {
        //var_dump(Storage::disk('s3')->has('Picture2.jpg'));
        return view('upload');
    }

    public function upload(Request $request)
    {  
        
        
        if ($request->hasFile("file")) {
            $attachments = $request->file("file");
            var_dump($attachments);

           
                // Generate nama unik untuk file
                $fileName = uniqid('attachment_') . '.' . $attachments->getClientOriginalExtension();

                // Simpan file ke direktori yang diinginkan
                $filePath = $attachments->storeAs('public/data_file/', $fileName);
                $path = Storage::disk('s3')->putFile('BucketStorage', $attachments, 'public');
                // Simpan informasi file ke dalam database
                return redirect()->back()->with('success', 'File uploaded successfully.');
             
        }

        return redirect()->back()->with('error', 'File not found.');
    }
}