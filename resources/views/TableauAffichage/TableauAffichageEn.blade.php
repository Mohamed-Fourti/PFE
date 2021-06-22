@extends('layouts.app')

@section('content')
<div class="container-fluid pb-5">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            @csrf
            @if ($message = Session::get('message'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    Création de nouveau Affichage
                </div>
                <div class="card-body ">
                    <form action="{{route('TableauAffichage.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group ">
                            <label for="title" class="col-4 col-form-label">title</label>
                            <div class="col-12">
                                <div class="input-group">

                                    <input id="title" name="title" type="text" class="form-control">

                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="slug" class="col-4 col-form-label">title</label>
                            <div class="col-12">
                                <div class="input-group">

                                    <input name="slug" id="slug" type="text" class="form-control" readonly="readonly">

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-4 col-form-label" for="file">Fichier :</label>
                            <div class="col-12">

                                <input id="input-fr" name="file" type="file" class="file" data-show-preview="false">
                                <div id="errors"></div>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-4 col-form-label" for="class">Classe :</label>
                            <div class="col-12">
                                <select id="class" name="class" class="custom-select">
                                    <option>choisir</option>
                                    @foreach($classes as $class)
                                    <option value="{{ $class->class}}">{{ $class->class}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="editor1" class="col-4 col-form-label">Remarques :</label>
                            <div class="col-12">
                                <textarea id="editor1" name="remarques" cols="40" rows="2" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group row d-flex justify-content-center">
                            <div class="btn-group ">
                                <button type="submit" value="Submit" class="btn btn-success">Enregistrer</button>
                                <button type="reset" value="Reset" class="btn btn-danger">Annuler</button>
                            </div>
                        </div>


                    </form>
                </div>

            </div>
        </div>

        <div class="col-md-2">

        </div>
    </div>

    <div class="row mt-3">

        <div class="col-md-1"></div>


        <div class="col-md-10">

            <div class="card">
                <div class="card-header">
                    Votre Réclamations
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table id="input-fr" class="table table-bordered table-hover">
                            <thead>
                                <tr>

                                    <th scope="col">Class</th>
                                    <th scope="col">file_name</th>
                                    <th scope="col">created_at</th>
                                    <th scope="col">Remarques</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $data)
                                <tr>

                                    <td>{{ $data->class}}</td>
                                    <td>{{ $data->file_name}}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td>{!! $data->remarques !!}</td>


                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">{{ $datas->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('scripts')
@include('AdminPanel.editorScript')

<script>
    $("#input-fr").fileinput({
        language: "fr",
        maxFileSize: ["5024"],
        dropZoneEnabled: false,
        showUpload: false,
        elErrorContainer: '#errors'
    });

    $(function() {
        $('#slug').keyup(function() {
            $(this).val(getSlug($(this).val()))
        })

        $('#title').keyup(function() {
            $('#slug').val(getSlug($(this).val()))
        })

        $('#title').keyup(function() {
            $('#slug').val(getSlug($(this).val()))
        })
    });
</script>
@endpush