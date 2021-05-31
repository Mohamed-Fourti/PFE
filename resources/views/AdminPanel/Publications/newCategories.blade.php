@extends('AdminPanel.layout')

@section('main')
<div class="container-fluid">
<form method="post" action="{{route('categories.store')}}">
@csrf
<div class="form-group">
    <div class="form-group">
    <label for="title" class="col-form-label">Titre</label> 
    <div class="col-12">
      <input id="title" name="title" type="text" class="form-control">
    </div>
  </div> 
                    
</div>

<button  type="submit" class="btn btn-primary ">cree</button>
</form>
</div>
@endsection
@push('scripts')


@endpush