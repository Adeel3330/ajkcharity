@extends('admin.layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-4">Update Group</h3>
        <a href="{{ route('admin.types') }}" class="btn btn-primary">
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
               <form action="{{ route('admin.group.update', $type->id) }}" method="POST">
                @csrf
                @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Group Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name',$type->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3" >{{ $type->description }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
