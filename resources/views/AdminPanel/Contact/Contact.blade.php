@extends('AdminPanel.layout')

@section('main')

<div class="container-fluid">
    
        <table id="table_id" class="table table-bordered" style="width:100%" >
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tel</th>
                    <th scope="col">Message</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>

                @foreach($datas as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->nom }}</td>
                    <td>{{ $data->prenom }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->tel }}</td>
                    <td>{{ $data->message }}</td>
                    <td class="d-flex justify-content-center">
                        <a class="delete mr-3" data-toggle="modal" data-target="#delete" data-id='{{$data->id}}'><i class="fa fa-trash" aria-hidden="true" style="color: red;font-size:20px;"></i></a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
</div>

<div id="delete" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">

            <form method="POST" action="{{ route('rattrapages.destroy','id')}}">
            @csrf
                <input hidden id="id" name="id">

                <div class="modal-header">
                    <h4 class="modal-title">Supprimer</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer le message ?
                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-info waves-effect waves-light">Supprimer</button>

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
        "order": [[ 2, "desc" ]]

} );
} );


</script>
@endpush