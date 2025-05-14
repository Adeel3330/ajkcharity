@extends('admin.layouts.app')

@section('content')
    <div class="container mt-5">
        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-0">Charity List</h3>
            {{-- <a href="{{ route('admin.charity.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Create
            </a> --}}
        </div>

        {{-- Flash Message --}}
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Charity Table --}}
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Sr No</th>
                            <th>Charity Name</th>
                            <th>CNIC</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($charities as $index => $charity)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $charity->charity_name }}</td>
                                <td>{{ $charity->cnic }}</td>
                                <td>{{ $charity->email }}</td>
                                <td>
                                    <a href="{{ route('admin.registration.show',$charity->id) }}" class="btn btn-sm btn-info" title="View">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted">No charities found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- Pagination --}}
                <div class="d-flex justify-content-end mt-3">
                    {{ $charities->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
