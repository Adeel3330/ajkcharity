@extends('admin.layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-4">Create Demography</h3>
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
                            <select class="form-control select2" name="parent_id">
                                <option value="">Select Parent</option>
                                @foreach ($demographies as $demography)
                                    <option value="{{ $demography->id }}"
                                        {{ old('parent_id') == $demography->id ? 'selected' : '' }}>
                                        {{ $demography->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('parent_id')
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
                            <select class="form-control select2" name="type">
                                <option value="">Select Type</option>
                                <option value="PROVINCE" {{ old('type') == 'PROVINCE' ? 'selected' : '' }}>PROVINCE</option>
                                <option value="DISTRICT" {{ old('type') == 'DISTRICT' ? 'selected' : '' }}>DISTRICT</option>
                                <option value="TEHSIL" {{ old('type') == 'TEHSIL' ? 'selected' : '' }}>TEHSIL</option>
                            </select>
                            @error('type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-2">
                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
