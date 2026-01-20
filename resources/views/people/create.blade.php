@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">Add People</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('people.store') }}" method="POST">
                        @csrf

                        <div class="row">

                            <!-- Name -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name *</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name') }}" placeholder="Enter name">
                            </div>

                            <!-- Email -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Email *</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email') }}" placeholder="Enter email">
                            </div>

                            <!-- Phone -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control"
                                    value="{{ old('phone') }}" placeholder="Enter phone">
                            </div>

                            <!-- Country -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Country</label>
                                <select name="country_id" class="form-select">
                                    <option value="">Select Country</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}">
                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- State -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">State</label>
                                <select name="state_id" class="form-select">
                                    <option value="">Select State</option>
                                    @foreach($states as $state)
                                        <option value="{{ $state->id }}">
                                            {{ $state->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- City -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">City</label>
                                <select name="city_id" class="form-select">
                                    <option value="">Select City</option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}">
                                            {{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ route('people.index') }}" class="btn btn-secondary">
                                Back
                            </a>
                            <button type="submit" class="btn btn-success">
                                Save People
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
