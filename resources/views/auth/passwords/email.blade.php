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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="fadeIn second">
                                <input id="inputType" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Adresse E-mail">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="fadeIn fourth">
                                <input type="submit" class="logbtn" value="{{ __('Envoyer le lien de renouvellement') }}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
