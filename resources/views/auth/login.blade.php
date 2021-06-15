@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center pb-5">
        <div class="col-auto">
            <div class="card" id="cardAuth">
                <div class="fadeIn first">
                    <img src="../images/depti.png" id="icon" />
                </div>


                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">

                            <div class="fadeIn second">
                                <input id="inputType" type="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Adresse E-mail">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="fadeIn third">
                                <input id="inputType" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Mot de passe">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Se rappeler de moi') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="fadeIn fourth">
                                <input type="submit" class=" logbtn" value=" {{ __('Connexion') }}">                                   
                                
                            </div>
                        </div>
                        <div id="linkbtn">
                            @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Mot de passe oublier?') }}
                                        </a>
                                        <p><a class="btn btn-link" href="{{ route('register') }}">Pas de compte ? Créez-en un</a></p>
                                    @endif
                        </div>
                    </form>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
