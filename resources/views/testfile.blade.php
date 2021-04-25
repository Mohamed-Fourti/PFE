@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @for ($i =0 ; $i < count($fileNames); $i++)

  {{$fileNames[$i]}}<br>
  @endfor
    </div>
</div>
@endsection
