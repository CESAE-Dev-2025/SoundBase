@extends('layouts.fe_master')


@section('content')
    <div class="col-6 mx-auto mt-4">
        <div class="mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Login</h5>
                    <form method="post" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" id="email"
                                aria-describedby="emailHelp" required>
                        </div>
                        @error('email')
                            <p class="text-danger">Erro de email</p>
                        @enderror

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" id="password" required>
                        </div>
                        @error('password')
                            <p class="text-danger">Erro de password</p>
                        @enderror

                        <button type="submit" class="btn btn-primary">Entrar</button>
                        <a href="{{ route('password.request') }}" class="btn btn-link">Esqueci minha password</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
