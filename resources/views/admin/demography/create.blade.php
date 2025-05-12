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
                            <select name="parent_id" class="form-control">
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
                        <div class="mb-3 col-md-4">
                            <label for="type" class="form-label">Type</label>
                            <select name="type" class="form-control">
                                <option value="">Select Type</option>
                                <option value="Province" {{ old('type') == 'Province' ? 'selected' : '' }}>Provinces</option>
                                <option value="District" {{ old('type') == 'District' ? 'selected' : '' }}>Districts</option>
                                <option value="Tehsil" {{ old('type') == 'Tehsil' ? 'selected' : '' }}>Tehsils</option>
                            </select>
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
