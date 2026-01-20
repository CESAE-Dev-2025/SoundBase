@extends('layouts.fe_master')


@section('content')
    <div class="col-6 mx-auto mt-4">
        <div class="mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Reset de password</h5>
                    <form method="post" action="{{ route('password.update') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input value="{{ request()->email }}" name="email" type="email" class="form-control"
                                id="email" aria-describedby="emailHelp" required readonly>
                        </div>
                        @error('email')
                            <p class="invalid-feedback">Erro de email</p>
                        @enderror

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" id="password" required>
                        </div>
                        @error('password')
                            <p class="invalid-feedback">Erro de password</p>
                        @enderror

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Password</label>
                            <input name="password_confirmation" type="password" class="form-control"
                                id="password_confirmation" required>
                        </div>
                        @error('password-confirmation')
                            <p class="invalid-feedback">Erro de password</p>
                        @enderror

                        <input type="text" name="token" value="{{ request()->route('token') }}" hidden>

                        <button type="submit" class="btn btn-primary">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
