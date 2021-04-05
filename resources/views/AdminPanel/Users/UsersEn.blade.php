@extends('AdminPanel.layout')

@section('main')
<div class="container-fluid">
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($users as $user)
                <tr>
                    <td>{{ $user->nom }}</td>
                    <td>{{ $user->prenom }}</td>
                    <td>{{ $user->email }}</td>
                    @csrf
                    <td>
                        <a class="dropdown-item text-danger" data-toggle="modal" data-target="#hh-delete-user-modal">{{__('Delete')}}</a>
                    </td>
                    <td>
                        <a class="dropdown-item text-danger" data-toggle="modal" data-target="#hh-edit-user-modal">{{__('Delete')}}</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

<!-- /.modal delete -->


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

<!-- /.modal edit -->


<div id="hh-edit-user-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">@foreach($users as $user)
            <form method="POST" action="{{ route('usersEt.destroy',$user->id) }}"> @endforeach

                <div class="modal-header">
                    <h4 class="modal-title">{{__('Delete User')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                    </button>
                </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Password</label>
                            <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Address 2</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">City</label>
                            <input type="text" class="form-control" id="inputCity">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">State</label>
                            <select id="inputState" class="form-control">
                                <option selected>Choose...</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputZip">Zip</label>
                            <input type="text" class="form-control" id="inputZip">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Check me out
                            </label>
                        </div>
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