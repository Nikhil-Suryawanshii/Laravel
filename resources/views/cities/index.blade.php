@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card shadow-sm">

                <!-- Header -->
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Cities</h5>
                    <a href="{{ url('/cities/create') }}" class="btn btn-primary btn-sm">
                        + Add City
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
                                    <th>City</th>
                                    <th style="width: 160px;">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($cities as $city)
                                    <tr>
                                        <td>{{ $city->id }}</td>
                                        <td>{{ $city->country_name }}</td>
                                        <td>{{ $city->state_name }}</td>
                                        <td>{{ $city->name }}</td>
                                        <td>
                                            <a href="{{ url('/cities/edit/'.$city->id) }}"
                                               class="btn btn-warning btn-sm me-1">
                                                Edit
                                            </a>

                                            <a href="{{ url('/cities/delete/'.$city->id) }}"
                                               class="btn btn-danger btn-sm"
                                               onclick="return confirm('Delete this city?')">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">No cities found</td>
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
