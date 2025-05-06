@extends('admin.layouts.app')

@section('content')
<div class="container mt-5">
    <h3 class="mb-4">Items List</h3>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th></th>
                        <th>Parent ID</th>
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
