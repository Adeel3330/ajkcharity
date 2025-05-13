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
                            <select class="form-control select2" id="select2" name="parent_id">
                                <option value="">Select Parent</option>
                                @foreach ($demographies as $demography)
                                    <option value="{{ $demography->id }}"
                                        {{ old('parent') == $demography->id ? 'selected' : '' }}>
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
                        <div class="col-md-4 mb-3">
                            <label for="unitTypeDropdown" class="form-label">Type</label>
                            <div class="dropdown">
                                <select class="form-control select2" id="select2" name='type'>
                                    <option value="PROVINCE">PROVINCE</option>
                                    <option value="DISTRICT">DISTRICT</option>
                                    <option value="TEHSIL">TEHSIL</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
