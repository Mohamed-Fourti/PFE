@extends('layouts.app')

@section('content')

<div class="form-group row">
    <div class="col-md-1"></div>

    <div class="col-md-10">
        <form action="{{route('profile/modifier')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">GSM</label>
                    <div class="col-sm-9">
                        <input type="text" id="f-gsm" name="gsm" class="form-control" value="{{$data->gsm}}" placeholder="GSM" />
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nom</label>
                    <div class="col-sm-9">
                        <input type="text" id="f-nom" name="nom" class="form-control" value="{{$data->nom}}" placeholder="" />
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Prénom</label>
                    <div class="col-sm-9">
                        <input type="text" id="f-prenom" name="prenom" class="form-control" value="{{$data->prenom}}" />
                    </div>
                </div>
                @role('Etudiants')

                <div style='' class="form-group row show">
                    <label class="col-sm-3 col-form-label">Classe</label>
                    <div class="col-sm-9">
                        <input type="text" id="f-classe" name="class" class="form-control" value="{{$data->class}}" disabled placeholder="Classe" />
                    </div>
                </div>
                @endrole

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">E-mail</label>
                    <div class="col-sm-9">
                        <input type="email" id="f_email" name="email" class="form-control" value="{{$data->email}}" />
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Changer mot de passe</label>
                    <div class="col-sm-9">
                        <input type="text" id="f_password" name="password" class="form-control" value="" placeholder="Changer mot de passe" />
                    </div>
                </div>



                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" for="image">Image</label>
                    <div class="col-sm-9">

                        <div class="file-loading">
                            <input id="input-fr" name="image" type="file" class="file" data-show-preview="false">
                        </div>
                        <div id="errors"></div>

                    </div>
                </div>

                <div class="col text-center">
                    <button type="submit" Style="width:200px; height:50px;" class="btn btn-primary">Modifier</button>
                </div>



            </div>
        </form>
    </div>
</div>


@endsection

@push('scripts')
<script>
    $("#input-fr").fileinput({
        language: "fr",
        maxFileSize: ["5024"],
        showUpload: false,
        dropZoneEnabled: false,

        elErrorContainer: '#errors'
    });
</script>

@endpush