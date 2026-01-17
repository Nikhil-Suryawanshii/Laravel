@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm">
                <div class="card-header">
                    <h5 class="mb-0">Add Country</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/countries/store') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Country Name</label>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   placeholder="Enter country name"
                                   required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ url('/countries') }}" class="btn btn-secondary">
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
