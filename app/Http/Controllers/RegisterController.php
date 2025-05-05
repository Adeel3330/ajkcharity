<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CharityRegistrationRequest;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\CharityRegistration;
use Session;
class RegisterController extends Controller
{
    public function index(){
        return view('UserSignUp');
    }
    public function store(CharityRegistrationRequest $request){
        // dd($request->all());
        try {
            CharityRegistration::create([
            'charity_name' => $request->charity_name,
            'province' =>  $request->province,
            'law_under_which_registered' =>  $request->law_under_which_registered,
            'category_area_operations' =>  $request->charity_name,
            'fullname' =>  $request->fullname,
            'guardian_name' =>  $request->guardian_name,
            'cnic' =>  $request->cnic,
            'nature_of_authorization' =>  $request->nature_of_authorization,
            'network' =>  $request->network,
            'mobile_no' =>  $request->mobile_no,
            'email' =>  $request->email,
            'authorization_document' =>  $request->authorization_document,
            'applicant_name' =>  $request->applicant_name,
            'challan_no' =>  $request->challan_no,
            'account_name' =>  $request->account_name,
            'bank_name' =>  $request->bank_name,
            'bank_branch_name' =>  $request->bank_branch_name,
            'bank_branch_code' =>  $request->bank_branch_code,
            'amount' =>  $request->amount,
            'deposit_date' =>  $request->deposit_date,
            'accept'=> isset($request->accept)?1:0,
            ]);
            Session::flash('success', 'You have successfully registered');
            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
        }

    }
}
