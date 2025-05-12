@extends('admin.layouts.app')
@section('content')
    <div class="container mt-5">
        {{-- Header with Create Button --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-0">Items List</h3>
            <a href="{{ route('admin.item.create') }}" class="btn btn-primary">
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
         <form method="GET" action="{{ route('admin.items') }}">
            <div class="row">
                <div class="col-md-4">
                    <div class="input-group">
                        <input type="search" value="{{ request('search') }}" name="search" class="form-control"
                            placeholder="Search by Parent Name,Name,Description ">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
        {{-- Groups Table --}}
        <div class="card shadow-sm mt-4">
            <div class="card-body">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>SrNO</th>
                            <th>Parent Name</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->parent->name }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->order }}</td>

                                <td>
                                    @if ($item->status == 1)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>

                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="{{ route('admin.item.edit', $item->id) }}" class="btn btn-sm btn-success"
                                            title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form action="{{ route('admin.item.destroy', $item->id) }}" method="POST"
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
                    {{ $items->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
