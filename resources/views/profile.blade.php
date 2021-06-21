@extends('layouts.app')

@section('content')

<div class="form-group row">
  <div class="col-md-1"></div>

  <div class="col-md-10">
  <form action="{{route('profile/modifier')}}" method="post">
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
                            <input type="text" id="f-nom" name="nom" class="form-control" value="{{$data->nom}}" placeholder=""/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Prénom</label>
                        <div class="col-sm-9">
                            <input type="text" id="f-prenom" name="prenom" class="form-control" value="{{$data->prenom}}" />
                        </div>
                    </div>

                    <div style='' class="form-group row show">
                        <label class="col-sm-3 col-form-label">Classe</label>
                        <div class="col-sm-9">
                            <input type="text" id="f-classe" name="class" class="form-control" value="{{$data->class}}" disabled  placeholder="Classe"/>
                        </div>
                    </div>

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
                        <label class="col-sm-3 col-form-label">Confirmer mot de passe</label>
                        <div class="col-sm-9">
                            <input type="password" id="f_password" name="password1" class="form-control" value=""  placeholder="Confirmer mot de passe"/>
                        </div>
                    </div>

                    <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="file">Image</label>
                            <div class="col-sm-9">

                                <input id="input-fr" name="file" type="file" class="file">
                                <div id="errors"></div>

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

@push('scripts')
<script>

  $("#input-fr").fileinput({
    language: "fr",
    allowedFileExtensions: ["jpg", "png", "jpeg","tif"],
    maxFileSize: ["2024"],
    dropZoneEnabled: false,
    elErrorContainer: '#errors'
  });

  $(document).ready(function() {
        $('#table_id').DataTable({
            "lengthMenu": [9, 25, 50, 75, 100],
            "order": [
                [2, "desc"]
            ],
            "language": {
                "sEmptyTable": "Aucune donnée disponible dans le tableau",
                "sInfo": "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
                "sInfoEmpty": "Affichage de l'élément 0 à 0 sur 0 élément",
                "sInfoFiltered": "(filtré à partir de _MAX_ éléments au total)",
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": "Afficher _MENU_ éléments",
                "sLoadingRecords": "Chargement...",
                "sProcessing": "Traitement...",
                "sSearch": "Rechercher :",
                "sZeroRecords": "Aucun élément correspondant trouvé",
                "oPaginate": {
                    "sFirst": "Premier",
                    "sLast": "Dernier",
                    "sNext": "Suivant",
                    "sPrevious": "Précédent"
                },
                "oAria": {
                    "sSortAscending": ": activer pour trier la colonne par ordre croissant",
                    "sSortDescending": ": activer pour trier la colonne par ordre décroissant"
                },
                "select": {
                    "rows": {
                        "_": "%d lignes sélectionnées",
                        "0": "Aucune ligne sélectionnée",
                        "1": "1 ligne sélectionnée"
                    }
                }
            }


        });
    });
  </script>

@endpush