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

                        {{-- Parent --}}
                        <div class="mb-3 col-md-4">
                            <label for="parent" class="form-label">Parent</label>
                            <select name="parent_id"  class="form-control select2" id="select2">
                                <option value="">Select Parent</option>
                                @foreach ($demographies as $item)
                                    <option value="{{ $item->id }}"
                                        {{ ($item->id == $demography->parent_id) ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('parent_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-4">
                            <label for="name" class="form-label"> Name</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $demography->name) }}">
                        </div>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        {{-- Type --}}
                        <div class="mb-3 col-md-4">
                            <label for="type" class="form-label">Type</label>
                            <select name="type"  class="form-control select2" id="select2">
                                <option value="">Select Type</option>
                                <option value="PROVINCE" {{ $demography->type == 'PROVINCE' ? 'selected' : '' }}>Provinces</option>
                                <option value="DISTRICT" {{ $demography->type == 'DISTRICT' ? 'selected' : '' }}>Districts</option>
                                <option value="TEHSIL" {{ $demography->type == 'TEHSIL' ? 'selected' : '' }}>Tehsils</option>
                            </select>
                            @error('type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
