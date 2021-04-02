@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
     <h1>adm</h1>
     @role('admin')
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <a class="btn btn-primary" href="{{ url('admin') }}">Admin</a>
        </div>
        @endrole

    </div>
</div>
@endsection
