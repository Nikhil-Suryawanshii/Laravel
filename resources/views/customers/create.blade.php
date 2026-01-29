@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">Add Customer</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('customers.store') }}" method="POST">
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
                                <select name="country_id" id="country" class="form-select">
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
                             <select name="state_id" id="state" class="form-select" disabled>
                                    <option value="">Select State</option>
                                </select>
                            </div>

                            <!-- City -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">City</label>
                             <select name="city_id" id="city" class="form-select" disabled>
                                <option value="">Select City</option>
                            </select>
                            </div>

                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ route('customers.index') }}" class="btn btn-secondary">
                                Back
                            </a>
                            <button type="submit" class="btn btn-success">
                                Save Customer
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
<script>
document.addEventListener('DOMContentLoaded', function () {

    const country = document.getElementById('country');
    const state = document.getElementById('state');
    const city = document.getElementById('city');

    country.addEventListener('change', function () {
        let countryId = this.value;

        state.innerHTML = '<option value="">Select State</option>';
        city.innerHTML = '<option value="">Select City</option>';
        city.disabled = true;

        if (!countryId) {
            state.disabled = true;
            return;
        }

        fetch(`/get-states/${countryId}`)
            .then(res => res.json())
            .then(data => {
                data.forEach(item => {
                    state.innerHTML +=
                        `<option value="${item.id}">${item.name}</option>`;
                });
                state.disabled = false;
            });
    });

    state.addEventListener('change', function () {
        let stateId = this.value;

        city.innerHTML = '<option value="">Select City</option>';

        if (!stateId) {
            city.disabled = true;
            return;
        }

        fetch(`/get-cities/${stateId}`)
            .then(res => res.json())
            .then(data => {
                data.forEach(item => {
                    city.innerHTML +=
                        `<option value="${item.id}">${item.name}</option>`;
                });
                city.disabled = false;
            });
    });

});
</script>