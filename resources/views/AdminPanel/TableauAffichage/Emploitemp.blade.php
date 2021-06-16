@extends('AdminPanel.layout')

@section('main')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">

        @csrf
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="card-header">
          Choisir un fichier
        </div>
        <div class="card-body">

          <form action="{{route('Emploi.store')}}" method="post" enctype="multipart/form-data">

            @csrf
            <div class="form-group">

              <div class="file-loading">
                <input id="input-fr" name="file" type="file" class="file" data-show-preview="false">

              </div>
              <div id="errors"></div>
            </div>
            <div class="form-group">

              <label for="select" class="col-2 col-form-label">Classe</label>
              <select id="select" name="list_classe_id" class="col-4 custom-select">
                <option value="" disabled selected hidden>Choisir</option>
                @foreach ($classes as $classe)
                <option value="{{ $classe->id }}"> {{ $classe->class }}</option>
                @endforeach
              </select>
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

  </div>
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
      <div class="card">

        <div class="card-header">
          List de emplois
        </div>
        <div class="card-body">
          <table id="table_id" class="table">
            <thead>
              <tr>
                <th scope="col">nom</th>
                <th scope="col">Path</th>
                <th scope="col">Class</th>
                <th scope="col">Date de dépôt</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($datas as $data)
              <tr>
                <td>{{ $data->file_name }}</td>
                <td>{{ $data->file_path }}</td>
                <td>{{ $data->ListClass->class }}</td>
                <td>{{ $data->created_at }}</td>
              </tr>
              @endforeach

            </tbody>
          </table>

        </div>
      </div>

    </div>

  </div>
</div>

@endsection
@push('scripts')
<script>
  $("#input-fr").fileinput({
    language: "fr",
    allowedFileExtensions: ["xlx", "xls", "pdf", "xlsx"],
    maxFileSize: ["2024"],
    dropZoneEnabled: false,
    elErrorContainer: '#errors',
    showUpload: false,

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