@extends('admin.layouts.app')

@section('content')
    <div class="container mt-5">
        {{-- Header with Create Button --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-0">Provinces List</h3>
            <a href="" class="btn btn-primary">
                <i class="bi bi-plus-lg"></i> Create
            </a>
        </div>

        {{-- Search Input --}}
        <form method="GET" action="{{ route('admin.demography') }}">
            <div class="row">
                <div class="col-md-4">
                    <div class="input-group">
                        <input type="search" value="{{ request('search') }}" name="search" class="form-control"
                            placeholder="Search by Name">
                        <button class="btn btn-outline-secondary" type="submit">
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
        <div class="tabs mt-4">
             <!-- Tabs Start -->
       <div class="container tab-links items">
           <!-- Tabs -->
           <ul class="nav nav-pills mb-3 border-bottom border-2" id="pills-tab" role="tablist">
               <li class="nav-item" role="presentation">
                   <input
                       class="btn btn-primary d-none d-md-inline-flex nav-link fw-semibold 
                       @if ($type!= 'PROVINCE' && $type!= 'DISTRICT' && $type!= 'TEHSIL') active @endif
                        position-relative"
                       type="submit" name="all" value="All" />
               </li>
               <li class="nav-item" role="presentation">

                   <button
                       class="btn btn-primary d-none d-md-inline-flex nav-link fw-semibold 
                       @if ($type == 'PROVINCE') active @endif
                        position-relative"
                       type="submit" name="type" value="PROVINCE">Provinces</button>
               </li>
               <li class="nav-item" role="presentation">
                   <button
                       class="btn btn-primary d-none d-md-inline-flex nav-link fw-semibold 
                       @if ($type == 'DISTRICT') active @endif
                        position-relative"
                       type="submit" name="type" value="DISTRICT">Districts</button>
               </li>
                <li class="nav-item" role="presentation">
                   <button
                       class="btn btn-primary d-none d-md-inline-flex nav-link fw-semibold 
                       @if ($type == 'TEHSIL') active @endif
                        position-relative"
                       type="submit" name="type" value="TEHSIL">Tehsils</button>
               </li>

           </ul>
         </form>

       </div>
        {{-- Groups Table --}}
        <div class="card shadow-sm mt-3">
            <div class="card-body">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>SrNo</th>
                            <th>Parent</th>
                            <th>Name</th>  
                            <th>Type</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($demography as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->Parent->name??'N/A' }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->type }}</td>
                                
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="" class="btn btn-sm btn-success"
                                            title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="" method="POST"
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
                                <td colspan="7" class="text-center text-muted">No Data found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- Pagination --}}
                <div class="flex justify-content-end mt-3">
                    {{ $demography->withQueryString()->links() }}
                </div>
            </div>
        </div>
       </div>
    </div>
@endsection
