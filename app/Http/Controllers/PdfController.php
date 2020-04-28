<?php

namespace App\Http\Controllers;
   

use Illuminate\Http\Request;
use Redirect;

use App\Pdf;
use PDF;
class PdfController extends Controller
{
    // public function index(){

    // 	// $data = new Pdf;
    // 	// $data->title='dr.';
    // 	// $data->name='sumit';
    // 	// $data->age='52';
    // 	// $data->save();
    // 	// return "data save";
    // 	$data = Pdf::all();
    // 	return view('pdf',compact('data'));
    // }
     public function index()
    {
        $data['notes'] = Pdf::paginate(10);  
   
        return view('list',$data);
    }
 
    public function pdf(){
      
     $data['title'] = 'Notes List';
     $data['notes'] =  Pdf::get();
 
     $pdf = PDF::loadView('notes.list_notes', $data);
   
     return $pdf->download('tuts_notes.pdf');
    }
}
