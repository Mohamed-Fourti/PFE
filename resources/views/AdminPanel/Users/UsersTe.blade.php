@extends('AdminPanel.layout')

@section('main')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="searchTe" method="get">
                <div class="input-group">
                    <input type="search" name="search" class="form-control">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary">Seach</button></span>
                </div>
            </form>
            </div>
    </div>
    <br>
    <div class="row">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col" class="Email">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($users as $user)
                <tr>
                    <td class="id">{{ $user->id }}</td>
                    <td class="nom">{{ $user->nom }}</td>
                    <td class="prenom">{{ $user->prenom }}</td>
                    <td class="email">{{ $user->email }}</td>
                    <td>
                        <a class="delete" data-toggle="modal" data-target="#delete"><i class="fa fa-trash" aria-hidden="true" style="color: red;font-size:16px;"></i></a>
                        <a class="edit" data-toggle="modal" data-target="#update"><i class="fa fa-edit" style="color: #2196f3;font-size:16px;"></i></a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        {{ $users->links() }}
    </div>
</div>



<div id="delete" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('usersEt.destroy','test' )}}"> 
            {{method_field('delete')}}

      		{{csrf_field()}}
              <input type="text" hidden class="col-sm-9 form-control" id="deleteid" name="id" value="" />

                <div class="modal-header">
                    <h4 class="modal-title">supprimer</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer l'utilisateur ?
                </div>
                <div class="modal-footer">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-info waves-effect waves-light">supprimer</button>

                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="update" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Éditer</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                </button>
                </button>
            </div>
            <form action="{{route('updateTe')}}" method="post">
                {{ csrf_field() }}
                <input type="text" hidden class="col-sm-9 form-control" id="id" name="id" value="" />
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">nom</label>
                        <div class="col-sm-9">
                            <input type="text" id="f-nom" name="nom" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">prenom</label>
                        <div class="col-sm-9">
                            <input type="text" id="f-prenom" name="prenom" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" id="e_email" name="email" class="form-control" value="" />
                        </div>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="sumbit" class="btn btn-info waves-effect waves-light" data-toggle="modal"><i class="icofont icofont-eye-alt"></i>Éditer</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection
@push('scripts')
<script>
    // select update js
    $(document).on('click', '.edit', function() {
        var _this = $(this).parents('tr');
        $('#id').val(_this.find('.id').text());
        $('#f-nom').val(_this.find('.nom').text());
        $('#f-prenom').val(_this.find('.prenom').text());
        $('#e_email').val(_this.find('.email').text());

    });
    $(document).on('click', '.delete', function() {
        var _this = $(this).parents('tr');
        $('#deleteid').val(_this.find('.id').text());
})
</script>



@endpush