@extends('layouts.app')

@section('content')

<div class="form-group row">
  <div class="col-md-1"></div>

  <div class="col-md-10">
  <form action="{{route('profile/modifier')}}" method="post">
  {{ csrf_field() }}
                <div class="card-body">
                   <!-- <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Id</label>
                        <div class="col-sm-9">
                            <input type="text" id="f-id" name="id" class="form-control" value="{{$data->id}}" />
                        </div>
                    </div> -->

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nom</label>
                        <div class="col-sm-9">
                            <input type="text" id="f-nom" name="nom" class="form-control" value="{{$data->nom}}" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Prénom</label>
                        <div class="col-sm-9">
                            <input type="text" id="f-prenom" name="prenom" class="form-control" value="{{$data->prenom}}" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">E-mail</label>
                        <div class="col-sm-9">
                            <input type="email" id="f_email" name="email" class="form-control" value="{{$data->email}}" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nouveau mot de passe</label>
                        <div class="col-sm-9">
                            <input type="text" id="f_password" name="password" class="form-control" value="" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Confirmer mot de passe</label>
                        <div class="col-sm-9">
                            <input type="password" id="f_password" name="password1" class="form-control" value="" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Ajouter photo</label>
                        <div class="col-sm-9">
                            <input type="file" id="f_image" name="image" class="form-control" />
                        </div>
                    </div>
                    <div class="col text-center">
                        <button name="submit" type="submit" Style ="width:200px; height:50px;" class="btn btn-primary">Modifier</button>
                    </div>



                </div>
            </form>
  </div>
</div>


@endsection