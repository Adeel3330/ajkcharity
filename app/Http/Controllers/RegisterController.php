<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CharityRegistrationRequest;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\CharityRegistration;
use App\Models\Type;
use App\Models\Image;
use App\Models\Demography;
use App\Models\AuthorizationDemography;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
        // Check cnic exist
        $cnic = CharityRegistration::where('cnic', $request->cnic)->exists();
        if($cnic){
            Session::flash('error', 'CNIC already exists');
            return redirect()->back();
        }
        try {
            DB::beginTransaction();
            $authorization = CharityRegistration::create([
            'charity_name' => $request->charity_name,
            // 'province' =>  $request->province,
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
            // create province if available
            if(isset($request->province)){
                AuthorizationDemography::create([
                    'auth_demo_id'=>  $authorization->id,
                    'demography_id'=>  $request->province,
                    'type'=>  'PROVINCE',
                ]);
            }
            if(isset( $request->district_id)){
                AuthorizationDemography::create([
                    'auth_demo_id'=>  $authorization->id,
                    'demography_id'=>  $request->district_id,
                    'type'=>  'DISTRICT',
                ]);
            }
            if (isset($request->tehsil_id)) {
                if (is_array($request->tehsil_id)) {

                    $items = []; // make sure to initialize before the loop

                    foreach ($request->tehsil_id as $item) {
                        $items[] = [
                            'auth_demo_id'   => $authorization->id,
                            'demography_id'  => $item,
                            'type'           => 'TEHSIL',
                        ];
                    }

                    AuthorizationDemography::insert($items);

                } else {
                    // Single value case
                    AuthorizationDemography::create([
                        'auth_demo_id'   => $authorization->id,
                        'demography_id'  => $request->tehsil_id,
                        'type'           => 'TEHSIL',
                    ]);
                }
            }

            // Document  document_file

            if (isset($request->document_file) && !empty($request->document_file)) {
                $image = $request->document_file->store('registrations/document', 'public');
                $path = request()->getSchemeAndHttpHost() . '/storage/' . $image;
                $authorization->document()->create([
                    'url' => $path,
                    'type'=>'document',
                ]);
            }
            // Challan Form
            if (isset($request->challan_fee_image) && !empty($request->challan_fee_image)) {
                $image_challan = $request->challan_fee_image->store('registrations/challan_forms', 'public');
                $path_challan = request()->getSchemeAndHttpHost() . '/storage/' . $image_challan;
                $authorization->challanForm()->create([
                    'url' => $path_challan,
                    'type'=>'challan',
                ]);
            }
            DB::commit();
            Session::flash('success', 'You have successfully registered');
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Charity registration failed: ' . $th->getMessage(), [
                'exception' => $th,
                'trace' => $th->getTraceAsString(),
            ]);
            throw $th;
            Session::flash('error', 'Some thing wrong');

        }

    }

    public function getChildType($parent_type_name)
    {
        $parent_type = Type::where('name', $parent_type_name)->first();
        return Type::where('parent_id', $parent_type->id)->get();
    }
}
