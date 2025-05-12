@extends('admin.layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-4">Create New Demography</h3>
            <a href="{{ route('admin.demography') }}" class="btn btn-primary">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.demography.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        {{-- Parent --}}
                        <div class="mb-3 col-md-4">
                            <label for="parent" class="form-label">Parent</label>
                            <input type="text" name="parent" class="form-control" value="{{ old('parent') }}">
                            @error('parent')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Name --}}
                        <div class="mb-3 col-md-4">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Type --}}
                        <div class="mb-3 col-md-4">
                            <label for="type" class="form-label">Type</label>
                            <input type="text" name="type" class="form-control" value="{{ old('type') }}">
                            @error('type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
