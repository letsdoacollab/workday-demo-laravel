@extends('layouts.admin')

@section('meta')
    <title>Add New User | Workday Time Clock</title>
    <meta name="description" content="Workday Add New User">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Add New User") }}

                <a href="{{ url('/admin/users') }}" class="btn btn-outline-primary btn-sm float-end">
                    <i class="fas fa-arrow-left"></i><span class="button-with-icon">{{ __("Return") }}</span>
                </a>
            </h2>
        </div>
    </div>

    <div class="card">
        <form action="{{ url('admin/users/register') }}" method="post" class="needs-validation" autocomplete="off" novalidate accept-charset="utf-8">
            @csrf
            <div class="card-header"></div>
            <div class="card-body">
                <div class="mb-3">
                  <label for="name" class="form-label">{{ __("Employee") }}</label>
                  <select name="name" class="form-select" required>
                    <option value="" disabled selected>Choose...</option>
                    @isset($employees)
                    @foreach ($employees as $data)
                        <option value="{{ $data->lastname }}, {{ $data->firstname }}" data-email="{{ $data->emailaddress }}"
                            data-ref="{{ $data->id }}">{{ $data->lastname }}, {{ $data->firstname }}</option>
                    @endforeach
                    @endisset
                  </select>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">{{ __("Email") }}</label>
                    <input type="email" name="email" value="" class="form-control" readonly>
                </div>

                <div class="mb-3">
                    <label for="dateto" class="form-label">{{ __("Account Type") }}</label>
                    <div class="form-check">
                      <input class="form-check-input" value="1" name="acc_type" type="radio" name="acc_type1" id="acc_type1" required>
                      <label class="form-check-label" for="acc_type1">{{ __("Employee") }}</label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" value="1" name="acc_type" type="radio" name="acc_type2" id="acc_type2" required>
                      <label class="form-check-label" for="acc_type2">{{ __("Admin") }}</label>
                    </div>
                </div>

                <div class="mb-3">
                  <label for="role_id" class="form-label">{{ __("Role") }}</label>
                  <select name="role_id" class="form-select" required>
                    <option value="" disabled selected>Choose...</option>
                    @isset($roles)
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                        @endforeach
                    @endisset
                  </select>
                </div>

                <div class="mb-3">
                  <label for="status" class="form-label">{{ __("Status") }}</label>
                  <select name="status" class="form-select text-uppercase" required>
                    <option value="" disabled selected>Choose...</option>
                    <option value="1">{{ __("Enabled") }}</option>
                    <option value="0">{{ __("Disabled") }}</option>
                  </select>
                </div>

                <div class="row g-2">
                    <div class="mb-3 col-md-6">
                        <label for="password" class="form-label">{{ __("Password") }}</label>
                        <input type="password" name="password" value="" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="password_confirmation" class="form-label">{{ __("Confirm Password") }}</label>
                        <input type="password" name="password_confirmation" value="" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <input type="hidden" value="" name="ref">
                
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-check-circle"></i><span class="button-with-icon">{{ __("Save") }}</span>
                </button>

                <a href="{{ url('/admin/users') }}" class="btn btn-secondary">
                    <i class="fas fa-times-circle"></i><span class="button-with-icon">{{ __("Cancel") }}</span>
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('/assets/js/validate-form.js') }}"></script>
    <script src="{{ asset('/assets/js/get-user-email.js') }}"></script>
@endsection