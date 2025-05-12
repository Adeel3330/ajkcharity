@extends('admin.layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-4">Update Demography</h3>
            <a href="{{ route('admin.demography') }}" class="btn btn-primary">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>
        <!-- Display Validation Errors -->



        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.demography.update', $demography->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label for="parent_name" class="form-label">Parent Name</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('parent_name', $demography->parent_name) }}">
                        </div>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="mb-3 col-md-4">
                            <label for="name" class="form-label"> Name</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $demography->name) }}">
                        </div>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="mb-3 col-md-4">
                            <label for="type" class="form-label">Type</label>
                            <input type="text" name="type" class="form-control" value="{{ $demography->type }}">

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
