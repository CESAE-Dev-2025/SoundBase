@extends('layouts.fe_master')


@section('content')
    <div class="col-6 mx-auto mt-4">
        <div class="mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Reset de password</h5>
                    <form method="post" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" id="email"
                                aria-describedby="emailHelp" required>
                        </div>
                        @error('email')
                            <p class="text-danger">Erro de email</p>
                        @enderror

                        @if (session('status'))
                            <div class="alert alert-info" role="alert">
                                Já está! Envaimaos um email com um link para reset da password.
                            </div>
                        @endif

                        <button type="submit" class="btn btn-primary">Enviar email</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
