@extends('admin.layouts.app')

@section('content')
<div class="container mt-5">
    <h3 class="mb-4">Edit Item</h3>

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

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('types.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- important for update -->

                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $item->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea name="description" class="form-control" rows="3" required>{{ old('description', $item->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status:</label>
                    <select name="status" class="form-select" required>
                        <option value="1" {{ old('status', $item->status) == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $item->status) == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="created_by" class="form-label">Created By:</label>
                    <input type="text" name="created_by" class="form-control" value="{{ old('created_by', $item->created_by) }}" required>
                </div>

                <div class="mb-3">
                    <label for="updated_by" class="form-label">Updated By:</label>
                    <input type="text" name="updated_by" class="form-control" value="{{ old('updated_by', $item->updated_by) }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
