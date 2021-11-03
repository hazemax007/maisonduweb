<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Signature;
use App\Models\User;
use App\Http\Resources\SignatureResource;
use Illuminate\Support\Facades\DB;
use Auth;

class SignatureController extends Controller
{
    public function welcome(){
        return view ('welcome');
    }

    public function signature(){
        return view('signature');
    }

    public function getSignatures(){
        $signatures = Signature::where('user_id', auth()->id())->get();
        return view('show', [ 'signatures' => $signatures ]);
    }

    public function detailSignature($id){
        $signature = Signature::findOrFail($id);
        return view('details', [ 'signature' => $signature ]);
    }

    public function postSignature(Request $req){
        $signature = new Signature();
        $signature->name = $req->name;
        $signature->job = $req->job;
        $signature->company = $req->company;
        $signature->email = $req->email;
        $signature->address = $req->address;
        $signature->phone = $req->phone;
        $signature->user_id = Auth::user()->id;
        $result = $signature->save();
        if($result){
            return['Result' => 'Data has been stored'];
        }
        else{
            return ['Result' => 'Operation failed'];
        }
    }

    public function destroySignature($id)
    {
        $signature = Signature::findOrFail($id);
        $signature->delete();

        return redirect("/getSignatures")->with('success','Signature deleted successfully');
    }

    public function upload(Request $request){

        $request->validate([
           'file' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:2048'
        ]);

        $fileUpload = new FileUpload;

        if($request->file()) {
            $file_name = time().'_'.$request->file->getClientOriginalName();
            $file_path = $request->file('file')->storeAs('uploads', $file_name, 'public');

            $fileUpload->name = time().'_'.$request->file->getClientOriginalName();
            $fileUpload->path = '/storage/' . $file_path;
            $fileUpload->save();

            return response()->json(['success'=>'File uploaded successfully.']);
        }
   }

   /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$imageName = time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move(public_path('images'), $imageName);

    	return response()->json(['success'=>'You have successfully upload file.']);
    }

}
