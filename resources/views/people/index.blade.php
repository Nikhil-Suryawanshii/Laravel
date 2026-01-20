@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card shadow-sm">

                <!-- Card Header -->
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">People</h5>
                    <a href="{{ route('people.create') }}" class="btn btn-primary btn-sm">
                        + Add People
                    </a>
                </div>

                <!-- Card Body -->
                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Country</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th style="width: 180px;">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($people as $peoples)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $peoples->name }}</td>
                                        <td>{{ $peoples->email }}</td>
                                        <td>{{ $peoples->phone }}</td>
                                        <td>{{ $peoples->country }}</td>
                                        <td>{{ $peoples->state }}</td>
                                        <td>{{ $peoples->city }}</td>
                                        <td>
                                            <a href="{{ route('people.edit', $peoples->id) }}"
                                               class="btn btn-warning btn-sm me-1">
                                                Edit
                                            </a>

                                            <form action="{{ route('people.destroy', $peoples->id) }}"
                                                  method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            No records found
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection
