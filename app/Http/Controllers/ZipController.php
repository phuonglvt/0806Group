<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ZipArchive;
use File;
use Illuminate\Support\Facades\Storage;

class ZipController extends Controller
{
    public function zipFile()
    {
         $zip = new ZipArchive;
         $fileName = 'MyZip.zip';
        // if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE) {
        //     foreach (Storage::files('public') as $name) {
        //         $file = Storage::get($name);
    
        //         if ($name != 'public/.gitignore') {
        //             $relativeNameInZipFile = basename($file);
        //             $zip->addFile($file, $relativeNameInZipFile);
        //         }
        //     }
        //     $zip->close();
        // }
        // return response()->download(public_path($fileName));
        $path = public_path();
        if($zip->open(public_path($fileName),ZipArchive::CREATE)===true)
        {
            $file = File::files(public_path('storage\idea\5'));
            foreach($file as $key => $value){
                $relativeNameInZipFile = basename ($value); 
                $zip->addFile($value,$relativeNameInZipFile);
            }
            $zip->close();
        }
        return response()->download(public_path($fileName));
    }
}
