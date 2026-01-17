@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">Add City</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/cities/store') }}">
                        @csrf

                        <!-- State -->
                        <div class="mb-3">
                            <label class="form-label">State</label>
                            <select name="state_id" class="form-select" required>
                                <option value="">Select State</option>
                                @foreach($states as $state)
                                    <option value="{{ $state->id }}">
                                        {{ $state->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- City Name -->
                        <div class="mb-3">
                            <label class="form-label">City Name</label>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   placeholder="Enter city name"
                                   required>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ url('/cities') }}" class="btn btn-secondary">
                                Back
                            </a>
                            <button type="submit" class="btn btn-success">
                                Save
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
