@extends('AdminPanel.layout')

@section('main')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="searchEt" method="get">
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
                    <th scope="col">Titre</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>

                @foreach($datas as $data)
                <tr>
                    <td class="id" hidden>{{ $data->id }}</td>
                    <td>{{ $data->title }}</td>
                    <td>{{ $data->user->nom }}</td>
                    <td>
                        @if($data->active==0 )
                        
                        <span class="badge badge-warning">Pas publié</span></h1><br>
                        <span>{{ $data->created_at }}</span>
                        
                        @else
                        <span class="badge badge-success">Publié</span></h1><br>
                        <span>{{ $data->created_at }}</span>
                        @endif
                    </td>
                    <td>
                        <a class="delete" data-toggle="modal" data-target="#delete" data-id='{{$data->id}}'><i class="fa fa-trash" aria-hidden="true" style="color: red;font-size:16px;"></i></a>
                        <a class="edit" href="{{route('publication.edit',$data->id)}}"><i class="fa fa-edit" style="color: #2196f3;font-size:16px;"></i></a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

<div id="delete" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">

            <form method="POST" action="{{ route('publication.destroy','id')}}">
                {{csrf_field()}}
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



@endpush