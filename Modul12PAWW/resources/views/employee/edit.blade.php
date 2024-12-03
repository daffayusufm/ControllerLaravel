@extends('layouts.app')

@section('content')
<div class="container-sm my-5">
    <div class="row justify-content-center">
        <div class="p-5 bg-light rounded-3 col-xl-6 border">
            <div class="mb-3 text-center">
                <i class="bi-pencil-square fs-1"></i>
                <h4>{{ $pageTitle }}</h4>
            </div>
            <hr>
            <form action="{{ route('employees.update', ['employee' => $employee->employee_id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" name="firstName" id="firstName" class="form-control" value="{{ old('firstName', $employee->firstname) }}">
                        @error('firstName')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" name="lastName" id="lastName" class="form-control" value="{{ old('lastName', $employee->lastname) }}">
                        @error('lastName')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $employee->email) }}">
                        @error('email')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="text" name="age" id="age" class="form-control" value="{{ old('age', $employee->age) }}">
                        @error('age')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="position" class="form-label">Position</label>
                        <select name="position" id="position" class="form-select">
                            @foreach ($positions as $position)
                                <option value="{{ $position->id }}" {{ old('position', $employee->position_id) == $position->id ? 'selected' : '' }}>
                                    {{ $position->code }} - {{ $position->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('position')
                            <div class="text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 d-grid">
                        <button type="submit" class="btn btn-primary btn-lg mt-3"><i class="bi-check-circle me-2"></i> Save</button>
                        <a href="{{ route('employees.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
