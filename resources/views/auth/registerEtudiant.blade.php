@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('inscriptionp') }}" >
                        @csrf

                        <input type="hidden"  id="role_id" name="role_id" value="Etudiants" >

                        <div  class="form-group row show">
                            <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('nom') }}</label>

                            <div class="col-md-6">
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom"    @if (!empty($ExcelImport)) value="{{$ExcelImport['nom_fr']}}"     @else value="{{old('nom')}}" @endif  readonly  >

                                @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div  class="form-group row show">
                            <label for="prenom" class="col-md-4 col-form-label text-md-right">{{ __('prenom') }}</label>
                            <div class="col-md-6">
                                <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom"    @if (!empty($ExcelImport)) value="{{$ExcelImport['prenom_fr']}}"     @else value="{{old('prenom')}}" @endif  readonly  >
                              
                                @error('prenom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div  class="form-group row show">
                            <label for="class" class="col-md-4 col-form-label text-md-right">{{ __('class') }}</label>
                            <div class="col-md-6">
                                <input id="class" type="text" class="form-control @error('class') is-invalid @enderror" name="class"    @if (!empty($ExcelImport)) value="{{ $tabclass[0][2][4] }}"     @else value="{{old('class')}}" @endif  readonly  >
                            </div>
                        </div>

                        <div  class="form-group row show show">
                            <label for="cin" class="col-md-4 col-form-label text-md-right">{{ __('cin') }}</label>

                            <div class="col-md-6">
                                <input id="cin" type="text" class="form-control @error('cin') is-invalid @enderror" name="cin" @if (!empty($ExcelImport)) value=" {{ $ExcelImport['cin'] }}"     @else value="{{old('cin')}}" @endif readonly autocomplete="cin" >

                                @error('cin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        

                        <div  class="form-group row show">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div  class="form-group row show show">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div  class="form-group row show">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row mb-0 show">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" >
                                    {{ __('Register') }}
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
