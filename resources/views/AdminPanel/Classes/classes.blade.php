@extends('AdminPanel.layout')

@section('main')
<div class="container-fluid">
<div class="row">
        <div class="col-md-12">
        <form action="{{route('class.store')}}" method="post" enctype="multipart/form-data">
        <div class="row">
        <div class="col-md-12">
        <label class="form-label" for="File"></label>
              <input type="file" id="input-fr"  data-browse-on-zone-click="true" name="file" placeholder="Choose files" class="form-control file" id="File"  >
        
            </div>
        
              <div class="col-md-8"><br>
            @csrf
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif
         
         </div>
            </div>
      <br>
        
          </form>
        
          </div>
      </div>
        
      <div class="row">

@foreach($datas as $data)
<div class="col-md-3">
<div class="card text-center">
  <div class="card-header">
  {{$data->name}}
  </div>
  <div class="card-body">
    <h5 class="card-title"></h5>
    <td><a  href="{{ route('class.show',$data->name) }}"><input class="btn btn-primary" type="submit" name="Show" value="Show" ></a></td>
    <!-- <td><a href="file:///storage/excel/uploads/{{$data->name}}" >open</a></td>-->
    <td><a  href="{{ route('delete',[$data->id,$data->name]) }}"><input class="btn btn-primary" type="submit" name="delete" value="Delete"></a></td>
  </div>

</div></div>@endforeach

</div>
</div>

@endsection

@push('scripts')
<script>
    

$("#input-fr").fileinput({
    language: "fr",
    allowedFileExtensions: ["xlx","xls"],
    maxFileSize: ["2024"],
    preferIconicPreview: true,
    previewFileIconSettings: { 
        'xls': '<i class="fas fa-file-excel text-success"></i>'
    },


});

</script>
@endpush