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
    Featured
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
    </tr>
  </thead>
  <tbody>
  @foreach ($datas as $data)
    <tr>
      <td>{{ $data->name }}</td>
      <td>{{ $data->file_path }}</td>
      <td>{{ $data->created_at }}</td>
    </tr>
  @endforeach

  </tbody>
</table>
 
  </div>
</div>

    </div>

</div>
</div>

@endsection
@push('scripts')
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
        "order": [[ 2, "desc" ]]

} );
} );

</script>
@endpush