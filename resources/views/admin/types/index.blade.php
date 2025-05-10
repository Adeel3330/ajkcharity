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

        {{-- Search Input --}}
        <div class="row">
            <div class="col-md-4">
                <div class="input-group">
                    <input type="search" class="form-control" id="dt-search-0" placeholder="Search by Name"
                        aria-controls="DataTables_Table_0">
                    <button class="btn btn-outline-secondary" type="button" id="search-button">
                        <i class="bi bi-search"></i>
                    </button>
                   
                </div>
            </div>
        </div>

        {{-- Flash Message --}}
        @if (session()->has('message'))
            <div class="alert alert-success text-white alert-dismissible fade show" role="alert"
                style="background-color: green;">
                <strong>{{ session('message') }}</strong>
                <button type="button" class="btn-close btn-close-white mt-5" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
        @endif

        {{-- Groups Table --}}
        <div class="card shadow-sm mt-3">
            <div class="card-body">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>SrNo</th>
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
                                        <a href="{{ route('admin.group.edit', $item->id) }}" class="btn btn-sm btn-success"
                                            title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('admin.group.destroy', $item->id) }}" method="POST"
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
                                <td colspan="7" class="text-center text-muted">No groups found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- Pagination --}}
                <div class="flex justify-content-end mt-3">
                    {{ $groups->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
