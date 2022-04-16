<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ZipArchive;
use File;
use Illuminate\Support\Facades\Storage;

class ZipController extends Controller
{
    public function zipDownload()
    {
            // $zip = new ZipArchive;
            // $fileName = 'MyZip.zip';
            // if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE) {
            //     foreach (Storage::allDirectories('app/public/idea/') as $name) {
            //         $file = Storage::get($name);
            //         if ($name != 'public/.gitignore') {
            //             $relativeNameInZipFile = basename($file);
            //             $zip->addFile($file, $relativeNameInZipFile);
            //         }
            //     }
            //     $zip->close();
            // }
            // return response()->download(public_path($fileName));
         $zip = new ZipArchive;
         $fileName = 'MyZip.zip';
        if($zip->open(public_path($fileName),ZipArchive::CREATE)===true)
        {
            $file = File::allfiles(storage_path('app/public/idea/'));
            foreach($file as $key => $value){
                $relativeNameInZipFile = basename ($value); 
                $zip->addFile($value,$relativeNameInZipFile);
        }
            $zip->close(); 
        }
        return response()->download(public_path($fileName));
    }
}



