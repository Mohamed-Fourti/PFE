@extends('AdminPanel.layout')

@section('main')
<div class="container-fluid">
    <div class="row">
        <div class=" col-12">
            <table id="table_id" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Cin</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Email</th>
                        <th scope="col">Class</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($users as $user)
                    <tr>
                        <td class="id">{{ $user->id }}</td>
                        <td>{{ $user->cin }}</td>
                        <td class="nom">{{ $user->nom }}</td>
                        <td class="prenom">{{ $user->prenom }}</td>
                        <td class="email">{{ $user->email }}</td>
                        <td class="class">{{ $user->class }}</td>
                        <td>
                            <a class="delete" data-toggle="modal" data-target="#delete" data-id="{{$user->id}}"><i class="fa fa-trash" aria-hidden="true" style="color: red;font-size:16px;"></i></a>
                            <a class="edit" data-toggle="modal" data-target="#update"><i class="fa fa-edit" style="color: #2196f3;font-size:16px;"></i></a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<!-- /.modal -->


<div id="delete" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('usersEt.destroy','test' )}}">
                {{method_field('delete')}}

                {{csrf_field()}}
                <input type="text" hidden class="col-sm-9 form-control" id="deleteid" name="id" value="" />

                <div class="modal-header">
                    <h4 class="modal-title">Supprimer</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer l'utilisateur ?
                </div>
                <div class="modal-footer">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-info waves-effect waves-light">Supprimer</button>

                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="update" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modifier</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                </button>
                </button>
            </div>
            <form action="{{route('updateEt')}}" method="post">
                {{ csrf_field() }}
                <input type="text" hidden class="col-sm-9 form-control" id="id" name="id" value="" />
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nom</label>
                        <div class="col-sm-9">
                            <input type="text" id="f-nom" name="nom" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Prénom</label>
                        <div class="col-sm-9">
                            <input type="text" id="f-prenom" name="prenom" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" id="f_email" name="email" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Classe</label>
                        <div class="col-sm-9">
                            <input type="text" id="f_class" name="class" class="form-control" value="" />
                        </div>
                    </div>




                </div>
                <div class="modal-footer">
                    <button type="sumbit" class="btn btn-info waves-effect waves-light" data-toggle="modal"><i class="icofont icofont-eye-alt"></i>Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection

@push('scripts')
<script>
    $(document).on('click', '.edit', function() {
        var _this = $(this).parents('tr');
        $('#id').val(_this.find('.id').text());
        $('#f-nom').val(_this.find('.nom').text());
        $('#f-prenom').val(_this.find('.prenom').text());
        $('#f_email').val(_this.find('.email').text());
        $('#f_class').val(_this.find('.class').text());

    });
    $(document).on('click', '.delete', function() {
        var _this = $(this).parents('tr');
        $('#deleteid').val(_this.find('.id').text());
    })

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