@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm">

                <!-- Header -->
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Countries</h5>
                    <a href="{{ url('/countries/create') }}" class="btn btn-primary btn-sm">
                        + Add Country
                    </a>
                </div>

                <!-- Body -->
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Country Name</th>
                                    <th style="width: 160px;">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($countries as $country)
                                    <tr>
                                        <td>{{ $country->id }}</td>
                                        <td>{{ $country->name }}</td>
                                        <td>
                                            <a href="{{ url('/countries/edit/'.$country->id) }}"
                                               class="btn btn-warning btn-sm me-1">
                                                Edit
                                            </a>

                                            <a href="{{ url('/countries/delete/'.$country->id) }}"
                                               class="btn btn-danger btn-sm"
                                               onclick="return confirm('Delete this country?')">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">No countries found</td>
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
