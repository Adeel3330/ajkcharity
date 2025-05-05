<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CharityRegistrationRequest;

class RegisterController extends Controller
{
    public function index(){
        return view('UserSignUp');
    }
    public function store(CharityRegistrationRequest $request){
        dd($request->all());
        try {

           
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }
}
