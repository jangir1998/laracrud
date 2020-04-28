<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;
//use Redirect;
use PDF;

class NoteController extends Controller
{
    public function index(){

    	// $data = new Note;
    	// $data->title='dr.';
    	// $data->name='sumit';
    	// $data->age='52';
    	// $data->save();
    	// return "data save";
    	// $data = Pdf::all();
    	//return view('notes');
    	                                 
        $data = Note::all();
        return($data);
   		
        $data = Note::first()->paginate(10);
   		return view('notes',compact('data'));
        
    }
 
     public function pdf(){
     $data =  Note::get();
     $pdf = PDF::loadView('notes_pdf',compact('data'));
     return $pdf->download('data.pdf');  // pdf name -> 'data.pdf'

    }
}
