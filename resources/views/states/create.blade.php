@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">Add State</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/states/store') }}">
                        @csrf

                        <!-- Country -->
                        <div class="mb-3">
                            <label class="form-label">Country</label>
                            <select name="country_id" class="form-select" required>
                                <option value="">Select Country</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}">
                                        {{ $country->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- State Name -->
                        <div class="mb-3">
                            <label class="form-label">State Name</label>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   placeholder="Enter state name"
                                   required>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ url('/states') }}" class="btn btn-secondary">
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
