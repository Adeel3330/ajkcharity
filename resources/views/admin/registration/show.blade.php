@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Charity Details</h2>

        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Charity Name</th>
                    <td>{{ $charityRegistration->charity_name }}</td>
                </tr>
                <tr>
                    <th>Province</th>
                    <td>{{ $charityRegistration->province }}</td>
                </tr>
                <tr>
                    <th>Law Registered Under</th>
                    <td>{{ $charityRegistration->law_under_which_registered }}</td>
                </tr>
                <tr>
                    <th>Category/Area of Operations</th>
                    <td>{{ $charityRegistration->category_area_operations }}</td>
                </tr>
                <tr>
                    <th>Full Name</th>
                    <td>{{ $charityRegistration->fullname }}</td>
                </tr>
                <tr>
                    <th>Guardian</th>
                    <td>{{ $charityRegistration->guardian }}</td>
                </tr>
                <tr>
                    <th>Guardian Name</th>
                    <td>{{ $charityRegistration->guardian_name }}</td>
                </tr>
                <tr>
                    <th>CNIC</th>
                    <td>{{ $charityRegistration->cnic }}</td>
                </tr>
                <tr>
                    <th>Nature of Authorization</th>
                    <td>{{ $charityRegistration->nature_of_authorization }}</td>
                </tr>
                <tr>
                    <th>Network</th>
                    <td>{{ $charityRegistration->network }}</td>
                </tr>
                <tr>
                    <th>Mobile No</th>
                    <td>{{ $charityRegistration->mobile_no }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $charityRegistration->email }}</td>
                </tr>
                <tr>
                    <th>Authorization Document</th>
                    <td>
                        @if ($charityRegistration->document->url)
                            <a href="{{ $charityRegistration->document->url }}" target="_blank">View Document</a>
                        @else
                            N/A
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Selected Category Fee</th>
                    <td>{{ $charityRegistration->selected_category_fee }}</td>
                </tr>
                <tr>
                    <th>Applicant Name</th>
                    <td>{{ $charityRegistration->applicant_name }}</td>
                </tr>
                <tr>
                    <th>Challan No</th>
                    <td>{{ $charityRegistration->challan_no }}</td>
                </tr>
                <tr>
                    <th>Account Name</th>
                    <td>{{ $charityRegistration->account_name }}</td>
                </tr>
                <tr>
                    <th>Bank Name</th>
                    <td>{{ $charityRegistration->bank_name }}</td>
                </tr>
                <tr>
                    <th>Bank Branch Name</th>
                    <td>{{ $charityRegistration->bank_branch_name }}</td>
                </tr>
                <tr>
                    <th>Bank Branch Code</th>
                    <td>{{ $charityRegistration->bank_branch_code }}</td>
                </tr>
                <tr>
                    <th>Amount</th>
                    <td>{{ $charityRegistration->amount }}</td>
                </tr>
                <tr>
                    <th>Deposit Date</th>
                    <td>{{ $charityRegistration->deposit_date ? \Carbon\Carbon::parse($charityRegistration->deposit_date)->format('d-m-Y') : 'N/A' }}
                    </td>
                </tr>
                <tr>
                    <th>Accept</th>
                    <td>{{ $charityRegistration->accept ? 'Yes' : 'No' }}</td>
                </tr>
                <tr>
                    <th>Created By</th>
                    <td>{{ $charityRegistration->created_by }}</td>
                </tr>
                <tr>
                    <th>Updated By</th>
                    <td>{{ $charityRegistration->updated_by }}</td>
                </tr>
                <tr>
                    <th>Deleted At</th>
                    <td>{{ $charityRegistration->deleted_at ? $charityRegistration->deleted_at->format('d-m-Y H:i') : 'N/A' }}
                    </td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $charityRegistration->created_at->format('d-m-Y H:i') }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $charityRegistration->updated_at->format('d-m-Y H:i') }}</td>
                </tr>
            </tbody>
        </table>

        <a href="{{ route('admin.getRegistrations') }}" class="btn btn-primary mt-3">Back to List</a>
    </div>
@endsection
