@extends('AdminPanel.layout')

@section('main')

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12"><br>
      @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <strong>{{ $message }}</strong>
      </div>
      @endif

    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-4">

      <div class="card">
        <div class="card-header">
          Ouvrir l'accès au fiche de vœux S1
        </div>
        <div class="card-body">
          <div class="col-8">
            <form action="{{ route('Ouverture',1) }}">
              <button type="submit" class="btn btn-success " {{ $S2==1 ? 'disabled' : '' }}>Ouverture</button></a>
            </form>
            <br>
            <form action="{{ route('Fermeture',1)}}">
              <button type="submit" class="btn btn-danger">Fermeture</button>
            </form>

          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          Ouvrir l'accès au fiche de vœux S2
        </div>
        <div class="card-body">
          <div class="col-8">
            <form action="{{ route('Ouverture',2) }}">
              <button type="submit" class="btn btn-success " {{ $S1==1 ? 'disabled' : '' }}>Ouverture</button></a>
            </form>
            <br>
            <form action="{{ route('Fermeture',2)}}">
              <button type="submit" class="btn btn-danger">Fermeture</button>
            </form>

          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-8 col-md-8 col-sm-8 col-8">
      <div class="card">
        <div class="card-header">
          Choisir un fichier

        </div>
        <div class="card-body">
          <form action="{{route('EtuMat')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="file-loading">
              <input id="input-fr" name="file" type="file" class="file @error('file') is-invalid @enderror" data-show-preview="false">

            </div>
            <div id="errors"></div>

            <label for="département">Département</label>
            <select id="département" name="département" class="form-control">
              <option value="TI">TI </option>
              <option value="TICIT">TICIT </option>
              <option value="GE">Département GE</option>
              <option value="GM">Département GM</option>
              <option value="SEG">Département SEG</option>
            </select>
            <div>
              <label for="Class">Class</label>
              <input id="Class" name="class" type="text" class="@error('class') is-invalid @enderror form-control">


              @error('class')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror

              <label for="Sem">Sem</label>
              <select id="Sem" name="sem" class="form-control">

                @foreach($datas as $data)
                <option value="{{$data->id}}">{{$data->sem}}</option>
                @endforeach
              </select>
              <br>
              <button type="submit" class="btn btn-primary ">cree</button>

          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12">

    <div class="row">

      <div class="col-lg-6 col-md-6 col-sm-6 col-6">
        <div class="card">

          <div class="card-header">
            List des plans d'études et des fiches matières S1.
          </div>
          <div class="card-body table-responsive">
            <table id="table_id1" class="table">

              <thead>
                <tr>
                  <th scope="col">Département</th>
                  <th scope="col">Class</th>
                  <th scope="col">Action</th>

                  <th scope="col">Nom de fichier</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($EtuMats->where('sem','1') as $EtuMat)
                <tr>
                  <td>{{ $EtuMat->département }}</td>
                  <td>{{ $EtuMat->class }}</td>
                  <td><a class="delete" data-toggle="modal" data-target="#delete" data-id='{{$EtuMat->id}}'><i class="fa fa-trash" aria-hidden="true" style="color: red;font-size:20px;"></i></a></td>
                  <td>{{ $EtuMat->name }}</td>
                </tr>
                @endforeach

              </tbody>

            </table>

          </div>
        </div>

      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-6">
        <div class="card">

          <div class="card-header">
            List des plans d'études et des fiches matières S2.
          </div>
          <div class="card-body table-responsive">
            <table id="table_id2" class="table">
              <thead>
                <tr>
                  <th scope="col">Département</th>
                  <th scope="col">Class</th>
                  <th scope="col">Nom de fichier</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($EtuMats->where('sem','2') as $EtuMat)
                <tr>
                  <td>{{ $EtuMat->département }}</td>
                  <td>{{ $EtuMat->class }}</td>
                  <td>{{ $EtuMat->name }}</td>
                  <td><a class="delete" data-toggle="modal" data-target="#delete" data-id='{{$EtuMat->id}}'><i class="fa fa-trash" aria-hidden="true" style="color: red;font-size:20px;"></i></a></td>

                </tr>
                @endforeach

              </tbody>
            </table>

          </div>
        </div>

      </div>
    </div>


  </div>

</div>

<div id="delete" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="POST" action="{{ route('Fiche-De-Vœux/delete')}}">
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
    allowedFileExtensions: ["xlx", "xls", "pdf", "xlsx"],
    maxFileSize: ["2024"],
    showUpload: false,
    dropZoneEnabled: false,
    elErrorContainer: '#errors',
    required: true,

  });
  $(document).ready(function() {
    $('#table_id1').DataTable({
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
  $(document).ready(function() {
    $('#table_id2').DataTable({
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