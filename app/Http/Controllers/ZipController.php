<?php
   
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use File;
use ZipArchive;
  
class ZipController extends Controller
{
	public function index(){
		return view('zipfile');
	}
    
    public function downloadZip()
    {
		 // $headers = ["Content-Type"=>"application/zip"];
   //      $fileName = $id.".zip"; // name of zip
   //      Zipper::make(public_path('/images/'.$id.'.zip')) //file path for zip file
   //              ->add(public_path()."/images/".$id.'/')->close(); //files to be zipped
   //      return response()
   //      ->download(public_path('/images/'.$fileName),$fileName, $headers);    	 
        $zip = new ZipArchive;
        $fileName = 'myNewFile.zip';
        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE)
        {
            $files = File::files(public_path('images'));
            foreach ($files as $key => $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }    
            $zip->close();
        }
        return response()->download(public_path($fileName));
    }
}/