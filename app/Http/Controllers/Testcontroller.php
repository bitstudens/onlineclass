<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\VoteRule;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
class Testcontroller extends Controller
{
    public function handleData(Request $request){


       

            // $file = $_FILES['file'];
            // $fileName =  time().'-'.rand(10,999999).'-'.$file['name'];
            // $fileExtension = pathinfo($fileName,PATHINFO_EXTENSION);
            // $dir = public_path().'/profiles'.'/';
            // move_uploaded_file($file['tmp_name'],$dir.$fileName);
        //    dd($fileExtension); 




        // $request->validate([
        //     'name' =>'required',
        //     'phone' =>'required',
        //     'dob' =>'required|date',
        //     'email' =>'required|email',
        //     'password' =>'required|min:6',
        //     'username' =>'required',
        //     'select' =>'digits:10'
        // ]);

        $data = [
            'category' => $request->category,
            'date' => $request->dob,
            'price' => $request->price,
            'status' => $request->status,
        ];

       return redirect()->back()->withInput();
    //    ->withErrors($validatedData);
    }


    public function index(){
         $data['products'] = Product::latest()->paginate(5); 
         return view('formhandling.index', $data);
    }




    public function handleProduct(Request $request){

        
        $request->validate([
            'category' => 'required',
            'date' => 'required',
            'price' => 'required',
            'status' => 'required',
            'file' => 'required|mimes:jpg,bmp,png'
        ]);

        try{

            $image_url  ='';
            if($request->has('file') && $request->file('file')){

                $file = $request->file;
                $fileName =  time().'-'.rand(10,999999).'-'. $file->getClientOriginalname();
                $path  = public_path().'/profiles'.'/';
                $file->move($path, $fileName);
                $image_url =  asset("profiles/$fileName");
            }

            $data = [
                'category' => $request->category,
                'date' => $request->date,
                'price' => $request->price,
                'status' => $request->status,
                'file' => $image_url,
            ];

            Product::insert($data);
            // session()->flash('message','Record Added Seccuessfully');
            Session::flash('message','Record Added Seccuessfully');
            return redirect()->route('product.index');
        
        }catch(\Exception $e){
            session()->flash('error','Something Went wrong');
            return redirect()->back()->withInput();
        }

       
        
    }

    public function edit($id){

        if(!$id){
            session()->flash('error','Something Went wrong');
            return redirect()->back();
        }

        $product = Product::find($id);

        if($product){
            return view('formhandling.edit', compact('product'));
        }

        session()->flash('error','Record not found!');
        return redirect()->back();


    }

    public function update(Request $request, $id){
        if(!$id){
            session()->flash('error','Something Went wrong');
            return redirect()->back();
        }
        $request->validate([
            'category' => 'required',
            'date' => 'required',
            'price' => 'required',
            'status' => 'required',
            'file' => 'required|mimes:jpg,bmp,png'
        ]);

        try{
                //file unlink remaining 
            $image_url  ='';
            if($request->has('file') && $request->file('file')){
                $file = $request->file;
                $fileName =  time().'-'.rand(10,999999).'-'. $file->getClientOriginalname();
                $path  = public_path().'/profiles'.'/';
                $file->move($path, $fileName);
                $image_url =  asset("profiles/$fileName");
            }

            $data = [
                'category' => $request->category,
                'date' => $request->date,
                'price' => $request->price,
                'status' => $request->status,
                'file' => $image_url,
            ];

          $product = Product::find($id);
          if($product){
            $product->update($data);
            // session()->flash('message','Record Added Seccuessfully');
            Session::flash('message','Record Update Seccuessfully');
            return redirect()->route('product.index');
          }
          return redirect()->route('product.index');
        }catch(\Exception $e){
            session()->flash('error','Something Went wrong');
            return redirect()->back()->withInput();
        }
    }


    public function delete($id){
        if(!$id){
            session()->flash('error','Something Went wrong');
            return redirect()->back();
        }

        $product = Product::find($id);
        if($product){
          $product->delete();
          // session()->flash('message','Record Added Seccuessfully');
          Session::flash('message','Record Deleted Seccuessfully');
          return redirect()->route('product.index');
        }

        session()->flash('error','Something Went wrong');
        return redirect()->back()->withInput();
    }


}
