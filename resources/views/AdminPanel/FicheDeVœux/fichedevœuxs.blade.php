@extends('AdminPanel.layout')

@section('main')
<div class="container-fluid">
  <div class="row">
    <div class="row">

      <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">

          <div class="card-header">
            List des fiche de vœuxs S1.
          </div>
          <div class="card-body">
            <table id="table_id1" class="table">

              <thead>
                <tr>
                  <th scope="col">Enseignants</th>
                  <th scope="col">Email</th>
                  <th scope="col">date de création</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($datas->where('fichedevœux_o_f_s_id','1') as $data)
                <tr>
                  <td>{{ $data->user->nom }}</td>
                  <td>{{ $data->user->email }}</td>
                  <td>{{ $data->created_at }}</td>
                  <td>
                  <a class="edit mr-3" href="{{route('Fiche-De-Vœux.show',$data->id)}}"><i class="fa fa-eye" style="color: green;font-size:20px;"></i></a>
                  <a class="delete mr-3" data-toggle="modal" data-target="#delete" data-id='{{$data->id}}'><i class="fa fa-trash" aria-hidden="true" style="color: red;font-size:20px;"></i></a>
                  </td>
                </tr>
                @endforeach

              </tbody>

            </table>

          </div>
        </div>

      </div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">

          <div class="card-header">
            List des fiche de vœuxs S2.
          </div>
          <div class="card-body">
            <table id="table_id2" class="table">
              <thead>
                <tr>
                  <th scope="col">Enseignants</th>
                  <th scope="col">Email</th>
                  <th scope="col">date de création</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($datas->where('fichedevœux_o_f_s_id','2') as $data)
                <tr>
                  <td>{{ $data->user->nom }}</td>
                  <td>{{ $data->user->email }}</td>
                  <td>{{ $data->created_at }}</td>
                  <td>
                  <a class="edit mr-3" href="{{route('Fiche-De-Vœux.show',$data->id)}}"><i class="fa fa-eye" style="color: green;font-size:20px;"></i></a>
                  <a class="delete mr-3" data-toggle="modal" data-target="#delete" data-id='{{$data->id}}'><i class="fa fa-trash" aria-hidden="true" style="color: red;font-size:20px;"></i></a>
                  </td>
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

@endsection
@push('scripts')
<script>
  $(document).ready(function() {
    $('#table_id1').DataTable({
      "lengthMenu": [9, 25, 50, 75, 100],
      "order": [
        [2, "desc"]
      ],
      "language":
{
	"sEmptyTable":     "Aucune donnée disponible dans le tableau",
	"sInfo":           "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
	"sInfoEmpty":      "Affichage de l'élément 0 à 0 sur 0 élément",
	"sInfoFiltered":   "(filtré à partir de _MAX_ éléments au total)",
	"sInfoPostFix":    "",
	"sInfoThousands":  ",",
	"sLengthMenu":     "Afficher _MENU_ éléments",
	"sLoadingRecords": "Chargement...",
	"sProcessing":     "Traitement...",
	"sSearch":         "Rechercher :",
	"sZeroRecords":    "Aucun élément correspondant trouvé",
	"oPaginate": {
		"sFirst":    "Premier",
		"sLast":     "Dernier",
		"sNext":     "Suivant",
		"sPrevious": "Précédent"
	},
	"oAria": {
		"sSortAscending":  ": activer pour trier la colonne par ordre croissant",
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
      "language":
{
	"sEmptyTable":     "Aucune donnée disponible dans le tableau",
	"sInfo":           "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
	"sInfoEmpty":      "Affichage de l'élément 0 à 0 sur 0 élément",
	"sInfoFiltered":   "(filtré à partir de _MAX_ éléments au total)",
	"sInfoPostFix":    "",
	"sInfoThousands":  ",",
	"sLengthMenu":     "Afficher _MENU_ éléments",
	"sLoadingRecords": "Chargement...",
	"sProcessing":     "Traitement...",
	"sSearch":         "Rechercher :",
	"sZeroRecords":    "Aucun élément correspondant trouvé",
	"oPaginate": {
		"sFirst":    "Premier",
		"sLast":     "Dernier",
		"sNext":     "Suivant",
		"sPrevious": "Précédent"
	},
	"oAria": {
		"sSortAscending":  ": activer pour trier la colonne par ordre croissant",
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