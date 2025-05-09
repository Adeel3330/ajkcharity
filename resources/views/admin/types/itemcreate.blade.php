@extends('admin.layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-4">Create New Item</h3>
            <a href="{{ route('admin.items') }}" class="btn btn-primary">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>
        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.item.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <!-- Parent Select -->
                        <div class="col-md-6 mb-3">
                            <label for="parent_id" class="form-label">Parent</label>
                            <select name="parent_id" class="form-control select2" required>
                                <option selected disabled>Select Parent</option>
                                @foreach ($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Group Name Select -->
                        <div class="col-md-6 mb-3">
                            <label for="group_name" class="form-label">Group Name</label>
                            <select name="group_name" class="form-control select2" required>
                                <option selected disabled>Select Group Name</option>
                                @foreach ($groups as $group)
                                    <option value="{{ $group->name }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
