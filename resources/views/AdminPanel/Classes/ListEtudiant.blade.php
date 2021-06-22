@extends('AdminPanel.layout')

@section('main')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8">

      <div class="card">


        <div class="card-header">
          Choisir un fichier
        </div>
        <div class="card-body">

          <form action="{{route('Liste-etudiants.store')}}" method="post" enctype="multipart/form-data">

            @csrf

            <div class="file-loading">
              <input id="input-fr" name="file" type="file" class="file" data-show-preview="false">

            </div>
            <div id="errors"></div>
          </form>
        </div>
      </div>

    </div>
    <div class="col-md-3">
      <form action="{{route('Liste-etudiants.misajour')}}" method="post">
        @csrf

        <button type="submit" class="btn btn-primary">Mise a jour</button>
      </form>
      </br>

      @csrf
      @if ($message = Session::get('msg'))
      <div class="alert alert-success ">
        <strong>{{ $message }}</strong>
      </div>
      @endif
    </div>

  </div>
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
      <div class="card">

        <div class="card-header">
          List etudiants
        </div>
        <div class="card-body">
          <table id="table_id" class="table">
            <thead>
              <tr>
                <th scope="col">nom</th>
                <th scope="col">Path</th>
                <th scope="col">Date de dépôt</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($datas as $data)
              <tr>
                <td>{{ $data->name }}</td>
                <td>{{ $data->file_path }}</td>
                <td>{{ $data->created_at }}</td>
                <td><a class="delete" data-toggle="modal" data-target="#delete" data-id='{{$data->id}}'><i class="fa fa-trash" aria-hidden="true" style="color: red;font-size:20px;"></i></a></td>
              </tr>
              @endforeach

            </tbody>
          </table>

        </div>
      </div>

    </div>

  </div>
</div>

<div id="delete" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="POST" action="{{ route('Liste-etudiants/delete')}}">
        @csrf

        <input hidden id="id" name="id">

        <div class="modal-header">
          <h4 class="modal-title">supprimer</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
          </button>
        </div>
        <div class="modal-body">
          Êtes-vous sûr de vouloir supprimer l'utilisateur ?
        </div>
        <div class="modal-footer">

          <button type="submit" class="btn btn-info waves-effect waves-light">supprimer</button>

        </div>
      </form>
    </div>
  </div>
</div>

@endsection
@push('scripts')
<script>
  $(document).on('click', '.delete', function() {
    let id = $(this).attr('data-id');
    $('#id').val(id);
  });

  $("#input-fr").fileinput({
    language: "fr",
    allowedFileExtensions: ["xlx", "xls", "xlsx"],
    maxFileSize: ["2024"],
    dropZoneEnabled: false,
    elErrorContainer: '#errors',
    required: true,

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