@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card shadow-sm">

                <!-- Header -->
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">States</h5>
                    <a href="{{ url('/states/create') }}" class="btn btn-primary btn-sm">
                        + Add State
                    </a>
                </div>

                <!-- Body -->
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Country</th>
                                    <th>State</th>
                                    <th style="width: 160px;">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($states as $state)
                                    <tr>
                                        <td>{{ $state->id }}</td>
                                        <td>{{ $state->country_name }}</td>
                                        <td>{{ $state->name }}</td>
                                        <td>
                                            <a href="{{ url('/states/edit/'.$state->id) }}"
                                               class="btn btn-warning btn-sm me-1">
                                                Edit
                                            </a>

                                            <a href="{{ url('/states/delete/'.$state->id) }}"
                                               class="btn btn-danger btn-sm"
                                               onclick="return confirm('Delete this state?')">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No states found</td>
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
