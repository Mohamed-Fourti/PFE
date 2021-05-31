@extends('AdminPanel.layout')


@section('main')
<div class="container-fluid">
    
        <table id="table_id" class="table table-bordered" style="width:100%" >
            <thead>
                <tr>
                    <th scope="col">Date d'inscription</th>
                    <th scope="col">Etudiants</th>
                    <th scope="col">Class</th>
                    <th scope="col">Publication</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>

                @foreach($datas as $data)
                <tr>
                    <input type="text" name="id"class="id" hidden value="{{ $data->id }}">
                    <td>{{ $data->created_at }}</td>
                    <td>{{ $data->user->nom }}</td>
                    <td>{{ $data->user->class }}</td>
                    <td>{{ $data->Publication->title }}</td>

                    <td class="d-flex justify-content-center">
                        <a class="delete" data-toggle="modal" data-target="#delete" data-id='{{$data->id}}'><i class="fa fa-trash" aria-hidden="true" style="color: red;font-size:20px;"></i></a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
</div>

<div id="delete" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">

            <form method="POST" action="{{ route('Inscriptions-list.destroy','id')}}">
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

$(document).ready( function () {
    $('#table_id').DataTable( {
  "lengthMenu": [  9, 25, 50, 75, 100 ],
  "order": [[ 0, "desc" ]]

} );} );

</script>
@endpush