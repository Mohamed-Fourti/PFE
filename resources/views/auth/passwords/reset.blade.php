@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center pb-5">
        <div class="col-md-6">
            <div class="card" id="cardAuth">
            <div class="fadeIn first">
                    <img src="../images/depti.png" id="icon" />
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">

                            <div class="fadeIn second">
                                <input id="inputType" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" placeholder="Adresse E-mail">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="fadeIn second">
                                <input id="inputType" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Mot de passe">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="fadeIn second">
                                <input id="inputType"type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmation mot de passe">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="fadeIn fourth">
                                <input type="submit" class="logbtn" value="{{ __('Renouveler !') }}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
