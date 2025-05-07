@extends('admin.layouts.app')

@section('content')
    <div class="container mt-5">
         <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-0">Items List</h3>
            {{-- <a href="{{ route('admin.item.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Create

            </a> --}}
        </div>

        <div class="card shadow-sm">
            <div class="card-body">

                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th></th>
                            <th>Parent Name</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Order</th>
                            <th>Created By</th>
                            <th>Updated By</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($items as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->parent->name }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    @if ($item->status == 1)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>{{ $item->order }}</td>
                                <td>{{ $item->created_by }}</td>
                                <td>{{ $item->updated_by }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">No items found.</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
                <div class="mt-3">
                    {{ $items->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
