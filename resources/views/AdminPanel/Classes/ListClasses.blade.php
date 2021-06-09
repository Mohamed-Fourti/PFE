@extends('AdminPanel.layout')

@section('main')
<div class="container-fluid">
<div class="row">

<div class="col-lg-6 col-md-6 col-sm-6 col-6">

<div class="card">

            @csrf
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif
           <div class="card-header">
           Ajouter un Class
  </div>
  <div class="card-body">
 
       <form action="{{route('Liste-class.store')}}" method="post" enctype="multipart/form-data">
        
       @csrf

       <div class="form-group ">
    <div class="col-12">
      <input  name="class" type="text" class="form-control">
    </div>
  </div>
  <div class="col text-center mt-3">
               <button  type="submit" Style ="width:200px; height:50px;" class="btn btn-primary">sauvegarder</button>
            </div>
        

            
        
          </form>
      </div>
      </div>
      </div>
 <div class="col-lg-6 col-md-6 col-sm-6 col-6">
 <div class="card">
    
  <div class="card-header">
  List etudiants
  </div>
  <div class="card-body">
  <table id="table_id" class="table">
  <thead>
    <tr>
      <th scope="col">Class</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($datas as $data)
    <tr>
      <td>{{ $data->class }}</td>
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

            <form method="POST" action="{{ route('Liste-class/delete')}}">
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
</script>

<script>

  $("#input-fr").fileinput({
    language: "fr",
    allowedFileExtensions: ["xlx", "xls", "pdf","xlsx"],
    maxFileSize: ["2024"],
    dropZoneEnabled: false,
    elErrorContainer: '#errors'
  });
  $(document).ready( function () {
    $('#table_id').DataTable( {
        "lengthMenu": [  9, 25, 50, 75, 100 ],
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
        

} );
} );


</script>
@endpush