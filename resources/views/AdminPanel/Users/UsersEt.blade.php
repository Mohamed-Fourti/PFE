@extends('AdminPanel.layout')

@section('main')
<div class="container-fluid">
    <div class="row">
        <table class="table">
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
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->cin }}</td>
                    <td>{{ $user->nom }}</td>
                    <td>{{ $user->prenom }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->class }}</td>
                    @csrf
                    <td>@method('DELETE')
                        <a class="dropdown-item text-danger" data-toggle="modal" data-target="#hh-delete-user-modal">{{__('Delete')}}</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

<!-- /.modal -->


<div id="hh-delete-user-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">@foreach($users as $user)
            <form method="POST" action="{{ route('usersEt.destroy',$user->id) }}"> @endforeach

                <div class="modal-header">
                    <h4 class="modal-title">{{__('Delete User')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer l'utilisateur ?
                </div>
                <div class="modal-footer">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-info waves-effect waves-light">{{__('Confirm Deletion')}}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div><!-- /.modal -->
@endsection