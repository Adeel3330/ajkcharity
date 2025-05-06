<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CharityRegistrationRequest;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\CharityRegistration;
use App\Models\Type;
use App\Models\Demography;
use Session;
class RegisterController extends Controller
{
    public function index(){
        $provinces = Demography::where('type','PROVINCE')->get();
        // dd($provinces);
        $law_under_registerations = $this->getChildType('law_under_registered');
        $category_area_operations = $this->getChildType('category_area_operations');
        $nature_authorization = $this->getChildType('nature_authorization');
        $networks = $this->getChildType('networks');
        $auth_document_type = $this->getChildType('auth_document_type');
        $banks = $this->getChildType('banks');
        
        // dd($law_under_registerations);
        return view('user_signup', [
            'provinces'=>$provinces,
            'law_under_registerations'=>$law_under_registerations,
            'category_area_operations'=>$category_area_operations,
            'nature_authorization'=>$nature_authorization,
            'networks'=>$networks,
            'auth_document_type'=>$auth_document_type,
            'banks'=>$banks,
        ]);
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
            'selected_category_fee'=>$request->selected_category_fee,
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

    public function getChildType($parent_type_name)
    {
        $parent_type = Type::where('name', $parent_type_name)->first();
        return Type::where('parent_id', $parent_type->id)->get();
    }
}
