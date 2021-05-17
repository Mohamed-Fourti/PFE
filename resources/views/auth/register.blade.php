@extends('layouts.app')

@section('content')
<div class="container pb-5">


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>


                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="role_id" class="col-md-4 col-form-label text-md-right">{{ __('Register as:') }}</label>
                            <div class="col-md-6">
                                <select id="role_id" name="role_id" class="form-control">
                                    <option value="Etudiants" >Etudiants</option>
                                    <option value="Enseignants"  @if (old('role_id') == 'Enseignants') selected="selected" @endif>Enseignants</option>
                                    <option value="Techniciens" @if (old('role_id') == 'Techniciens') selected="selected" @endif>Techniciens</option>
                                </select>
                            </div>
                        </div>

                        <div style='display:none;' class="form-group row show" >
                            <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('nom') }}</label>

                            <div class="col-md-6">
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>

                                @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div style='display:none;' class="form-group row show" >
                            <label for="prenom" class="col-md-4 col-form-label text-md-right">{{ __('prenom') }}</label>

                            <div class="col-md-6">
                                <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>

                                @error('prenom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        

     

                        <div style='display:none;' class="form-group row show">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse e-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div style='display:none;' class="form-group row show show">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="{{ $error }}" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div style='display:none;' class="form-group row show">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmer mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

    

                        <div style='display:none;' class="form-group row mb-0 show">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>

                            </div>
                        </div>
                </form>


                <form method="POST" action="{{ route('inscriptionEt') }}">
                    @csrf

                    <div class="form-group row a">
                        <label for="cin" class="col-md-4 col-form-label text-md-right">Cin</label>

                        <div class="col-md-6 ">
                            <input id="cin" type="text" class="form-control @error('cin') is-invalid @enderror form-control" id="cin" name="cin" required>
                            
                            @if ($errors->any())


                            <span class="text-danger" role="alert">
                               <small> <strong> {{ $errors->first()}} </strong></small>
                            </span>
                            
                            @endif

                        </div>
                    </div>

                    <div class="form-group row mb-0 a">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                submit
                            </button>

                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>

</div>
@endsection
@push('scripts')
<script>


    

        $("#role_id").change( function() {
            if (this.value == "Etudiants") {
                $(".a").show();
            } else {
                $(".a").hide();
            }

            if (this.value == ("Enseignants") || this.value == ("Techniciens")) {
                $(".show").show();
            } else {
                $(".show").hide();
            }

        });
        $("#role_id").trigger("change");



    
</script>

@endpush