@extends('layouts.app')

@section('content')
<div class="container pb-5">


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="fadeIn first">
                    <img src="../images/depti.png" id="icon" />
                </div>


                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="fadeIn second">
                                <select id="role_id" name="role_id" class="form-control">
                                    <option value="Etudiants" >Etudiants</option>
                                    <option value="Enseignants"  @if (old('role_id') == 'Enseignants') selected="selected" @endif>Enseignants</option>
                                    <option value="Techniciens" @if (old('role_id') == 'Techniciens') selected="selected" @endif>Techniciens</option>
                                </select>
                            </div>
                        </div>

                        <div style='display:none;' class="form-group row show" >

                            <div class="fadeIn second">
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus placeholder="Nom">

                                @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div style='display:none;' class="form-group row show" >

                            <div class="fadeIn second">
                                <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus placeholder="Prénom">

                                @error('prenom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        

     

                        <div style='display:none;' class="form-group row show">

                            <div class="fadeIn second">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Adresse E-mail">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div style='display:none;' class="form-group row show show">
                            <div class="fadeIn second">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Mot de passe">

                                @error('password')
                                <span class="{{ $error }}" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div style='display:none;' class="form-group row show">

                            <div class="fadeIn second">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmation du mot de passe">
                            </div>
                        </div>

    

                        <div style='display:none;' class="form-group row mb-0 show">
                            <div class="fadeIn fourth">
                                <input type="submit" class=" logbtn" value="  {{ __('Enregistrer') }}">

                            </div>
                        </div>
                </form>


                <form method="POST" action="{{ route('inscriptionEt') }}">
                    @csrf

                    <div class="form-group row a">

                        <div class="fadeIn second">
                            <input id="cin" type="text" class="form-control @error('cin') is-invalid @enderror form-control" id="cin" name="cin" required placeholder="CIN">
                            
                            @if ($errors->any())


                            <span class="text-danger" role="alert">
                               <small> <strong> {{ $errors->first()}} </strong></small>
                            </span>
                            
                            @endif

                        </div>
                    </div>

                    <div class="form-group row mb-0 a">
                        <div class="fadeIn fourth">
                        <input type="submit" class=" logbtn" value="  {{ __('Enregistrer') }}">

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