<?php

namespace App\Http\Controllers;

use App\Uploadfile;
use Illuminate\Http\Request;
use PDF;
use Zipper;
// use File;
use ZipArchive;
class UploadfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data = Uploadfile::all();

        $data = Uploadfile::first()->paginate(4);
        return view('index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // echo "create method called";
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //echo "store method is called";
        $request->validate([
            'first_name'    =>  'required|string|min:2|max:25',
            'last_name'     =>  'required|string|min:2|max:25',
            
           
        ]);

        //$image=$request->file('image');

        $files = $request->file('image');
        if($request->hasFile('image'))
        {
            foreach ($files as $file) {
                
                $file_name=rand().'.'. $file->getClientOriginalExtension();
                $file->move(public_path('images'),$file_name);

                $form_data = array(
                'first_name'       =>   $request->first_name,
                'last_name'        =>   $request->last_name,
                'image'            =>   $file_name,
        );                                      
                Uploadfile::create($form_data);
            }
        }
       
        

        // Uploadfile::create($form_data);
         return redirect()->back()->with('message', 'File Upload Successfully');

        // $my_image=rand().'.'. $image->getClientOriginalExtension();
        // $image->move(public_path('images'),$my_image);


        // $form_data = array(
        //     'first_name'       =>   $request->first_name,
        //     'last_name'        =>   $request->last_name,
        //     'image'            =>   $my_image
        // );
     
        // Uploadfile::create($form_data);
        // return redirect()->back()->with('message', 'File Upload Successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Uploadfile  $uploadfile
     *  @return \Illuminate\Http\Response
     */
    public function show($uploadfile)
    {
        //echo "upload method called";

        $data=Uploadfile::findOrFail($uploadfile);
        return view('view',compact('data'));
        //dd(compact('upoadfile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Uploadfile  $uploadfile
     * @return \Illuminate\Http\Response
     */
    public function edit($uploadfile)
    {
        $data=Uploadfile::findOrFail($uploadfile);
        return view('edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Uploadfile  $uploadfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uploadfile)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != ''){
            $request->validate([
            'first_name'    =>  'required',
            'last_name'     =>  'required',
            'image'         =>  'required|image|max:3000'
            ]);
            $image_name=rand().'.'. $image->getClientOriginalExtension();
            $image->move(public_path('images'),$image_name);  // upload image in pbl folder(images)

        }
        else{
            $request->validate([
            'first_name'    =>  'required',
            'last_name'     =>  'required'
            ]);
        }

        $form_data= array(
            'first_name'       =>   $request->first_name,
            'last_name'        =>   $request->last_name,
            'image'            =>   $image_name
        );


        Uploadfile::whereId($uploadfile)->update($form_data);
        return redirect()->back()->with('message', 'File Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Uploadfile  $uploadfile
     * @return \Illuminate\Http\Response
     */
    public function destroy($uploadfile)
    {
        //echo "destroy method called";
        $data=Uploadfile::findOrFail($uploadfile);
        $data->delete();
        return redirect()->back()->with('message', 'Delete data Successfully');

    }

    public function pdf(){
     //$data =  Uploadfile::all();
     $data = Uploadfile::first();
     //return view('uploadfile_pdf',compact('data'));
      $pdf = PDF::loadView('uploadfile_pdf',compact($data));
      return $pdf->download('upload_data.pdf');  // pdf name -> 'data.pdf'
    }
    public function downloadZip($id)
    {
        //return('downloadZip page .$id');
        $headers = ["Content-Type"=>"application/zip"];
        $fileName = $id.".zip"; // name of zip

        Zipper::make(public_path('/images/'.$id.'.zip')) //file path for zip file
                ->add(public_path()."/images/".$id.'/')->close(); //files to be zipped
        return response()
        ->download(public_path('/images/'.$fileName),$fileName, $headers);
    }
}
