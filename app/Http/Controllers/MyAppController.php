<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Signature;

class MyAppController extends Controller
{
    //
    public function welcome(){
        return view ('welcome');
    }
    public function signature(){
        return view('signature');
    }
    public function allSignatures(){
        $signatures = Signature::all();
        return $signatures;
    }
}
