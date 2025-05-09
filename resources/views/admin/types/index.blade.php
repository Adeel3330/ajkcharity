@extends('admin.layouts.app')

@section('content')
    <div class="container mt-5">
        {{-- Header with Create Button --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-0">Groups List</h3>
            <a href="{{ route('admin.group.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Create
            </a>
        </div>

        @if (session()->has('message'))
            <div class="alert alert-success text-white alert-dismissible fade show" role="alert"
                style="background-color:green;">
                <strong>{{ session('message') }}</strong>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        {{-- Groups Table --}}
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Created By</th>
                            <th>Updated By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($groups as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    @if ($item->status == 1)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>{{ $item->created_by }}</td>
                                <td>{{ $item->updated_by }}</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="{{ route('admin.group.edit',$item->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form action="{{ route('admin.group.destroy',$item->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure to delete this group?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">No items found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- Pagination --}}
                <div class=" justify-content-end mt-4">
                    {{ $groups->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
