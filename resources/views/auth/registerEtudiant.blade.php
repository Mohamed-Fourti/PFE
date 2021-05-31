@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row justify-content-center pb-5">
        <div class="col-md-8">
            <div class="card">
            <div class="fadeIn first">
                    <img src="../images/depti.png" id="icon" />
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('inscriptionp') }}" >
                        @csrf

                        <input type="hidden"  id="role_id" name="role_id" value="Etudiants" >

                        <div  class="form-group row show show">

                            <div class="fadeIn second">
                                <input id="cin" type="text" class="form-control @error('cin') is-invalid @enderror" name="cin" @if (!empty($ExcelImport)) value=" {{ $ExcelImport['cin'] }}"     @else value="{{old('cin')}}" @endif readonly autocomplete="cin" >

                                @error('cin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div  class="form-group row show">

                            <div class="fadeIn second">
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom"    @if (!empty($ExcelImport)) value="{{$ExcelImport['nom_fr']}}"     @else value="{{old('nom')}}" @endif  readonly  >

                                @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div  class="form-group row show">
                            <div class="fadeIn second">
                                <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom"    @if (!empty($ExcelImport)) value="{{$ExcelImport['prenom_fr']}}"     @else value="{{old('prenom')}}" @endif  readonly  >
                              
                                @error('prenom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div  class="form-group row show">
                            <div class="fadeIn second">
                                <input id="class" type="text" class="form-control @error('class') is-invalid @enderror" name="class"    @if (!empty($ExcelImport)) value="{{ $ExcelImport['class']}}"     @else value="{{old('class')}}" @endif  readonly  >
                            </div>
                        </div>                     
                        

                        <div  class="form-group row show">

                            <div class="fadeIn second">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Adresse E-mail">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div  class="form-group row show show">

                            <div class="fadeIn second">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Mot de passe">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div  class="form-group row show">

                            <div class="fadeIn second">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmation du mot de passe">
                            </div>
                        </div>
                        <div class="form-group row mb-0 show">
                            <div class="fadeIn fourth">
                                <input type="submit" class=" logbtn" value="  {{ __('Enregistrer') }}" >
                            </div>
                        </div>
                      
                    </form>
                    

              
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
