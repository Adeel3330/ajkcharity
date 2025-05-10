@extends('admin.layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-4">Update Item</h3>
        <a href="{{ route('admin.items') }}" class="btn btn-primary">
               <i class="bi bi-arrow-left"></i> Back
            </a>
            </div>
        <!-- Display Validation Errors -->
       

        <div class="card">
            <div class="card-body">
               <form action="{{ route('admin.item.update', $type->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                     <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Parent  </label>
                        <select name="parent_id" class="form-control select2" required>
                                <option selected disabled>Select Parent </option>
                                @foreach ($groups as $group)
                                    <option value="{{ $group->id }}" @if ($group->id == $type->parent_id) selected @endif>{{ $group->name }}</option>
                                @endforeach
                        </select>
                         @error('parent_id')
                                <span class="text-danger">{{ $message }}</span>
                         @enderror
                     </div>
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">New Item</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name',$type->name) }}" required>
                    </div>
                    </div>
                     @error('name')
                                <span class="text-danger">{{ $message }}</span>
                     @enderror

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
