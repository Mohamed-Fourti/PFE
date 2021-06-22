@extends('AdminPanel.layout')

@section('main')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">

        @csrf
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="card-header">
          Choisir un fichier

        </div>
        <div class="card-body">

          <form action="{{route('Listmatières.store')}}" method="post" enctype="multipart/form-data">

            @csrf

            <div class="file-loading">
              <input id="input-fr" name="file" type="file" class="file" data-show-preview="false">

            </div>
            <div id="errors"></div>




          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
      <div class="card">

        <div class="card-header">
          List des plans d'études et des fiches matières S2.
        </div>
        <div class="card-body">
          <table id="table_id" class="table">
            <thead>
              <tr>
                <th scope="col">nom</th>
                <th scope="col">Path</th>
                <th scope="col">Date de dépôt</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($datas as $data)
              <tr>
                <td>{{ $data->name }}</td>
                <td>{{ $data->file_path }}</td>
                <td>{{ $data->created_at }}</td>
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

      <form method="POST" action="{{ route('Listmatières/delete')}}">
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
    allowedFileExtensions: ["xlx", "xls", "xlsx"],
    maxFileSize: ["2024"],
    dropZoneEnabled: false,
    elErrorContainer: '#errors',
    required: true,

  });
  $(document).ready(function() {
    $('#table_id').DataTable({
      "lengthMenu": [9, 25, 50, 75, 100],
      "order": [
        [2, "desc"]
      ]

    });
  });
</script>
@endpush