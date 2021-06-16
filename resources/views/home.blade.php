@extends('layouts.app')

@section('content')
<form action="{{route('ColloqueScientifique/pdf')}}" method="post">
    {{ csrf_field() }}

    <button name="submit" type="submit" Style="width:200px; height:50px;" class="btn btn-primary">Modifier</button>


</form>
@endsection