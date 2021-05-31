

@extends('layouts.app')

@section('content')
<div class="form-group row">
    <label for="select" class="col-4 col-form-label">Matiere</label> 
    <div class="col-8">
      <select id="select" name="select" class="custom-select">
    @foreach ($Matieres as $Matiere)
        <option value="rabbit">{{ $Matiere['appelation'] }}</option>
    @endforeach
      </select>
    </div>
  </div> 
@endsection
