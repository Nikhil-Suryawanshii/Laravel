@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card shadow-sm">
            <div class="card-header">
                <h5>Edit Student</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('students.update', $student->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control"
                                   value="{{ $student->name }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control"
                                   value="{{ $student->email }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control"
                                   value="{{ $student->phone }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>DOB</label>
                            <input type="date" name="dob" class="form-control"
                                   value="{{ $student->dob }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Gender</label>
                            <select name="gender" class="form-select">
                                <option value="male" {{ $student->gender=='male'?'selected':'' }}>Male</option>
                                <option value="female" {{ $student->gender=='female'?'selected':'' }}>Female</option>
                                <option value="other" {{ $student->gender=='other'?'selected':'' }}>Other</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Course</label>
                            <input type="text" name="course" class="form-control"
                                   value="{{ $student->course }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Admission Date</label>
                            <input type="date" name="admission_date" class="form-control"
                                   value="{{ $student->admission_date }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Status</label>
                            <select name="status" class="form-select">
                                <option value="1" {{ $student->status ? 'selected':'' }}>Active</option>
                                <option value="0" {{ !$student->status ? 'selected':'' }}>Inactive</option>
                            </select>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Address</label>
                            <textarea name="address" class="form-control" rows="3">{{ $student->address }}</textarea>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
                        <button class="btn btn-primary">Update Student</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
