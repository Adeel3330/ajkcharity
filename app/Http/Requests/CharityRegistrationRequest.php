<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
class CharityRegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'charity_name' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'law_under_which_registered' => 'required',
            'category_area_operations' => 'required',
            'fullname' => 'required|string|max:255',
            'guardian_name' => 'required|string|max:255',
            'cnic' => 'required',
            'nature_of_authorization' => 'required',
            'network' => 'required|string|max:255',
            'mobile_no' => 'required',
            'email' => 'required|email',
            'authorization_document' => 'required',
            'applicant_name' => 'required|string|max:255',
            'challan_no' => 'required',
            'account_name' => 'required',
            'bank_name' => 'required',
            'bank_branch_name' => 'required',
            'bank_branch_code' => 'required',
            'amount' => 'required|integer',
            'deposit_date' => 'required|date',
            'accept'=>'required',
        ];
    }
}
