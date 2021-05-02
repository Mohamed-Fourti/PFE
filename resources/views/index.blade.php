@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @role('admin')
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <a class="btn btn-primary" href="{{ url('admin') }}">Admin</a>
        </div>
    @endrole
    @role('Techniciens')
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <a class="btn btn-primary" href="{{ url('réclamations') }}">Réclamation</a>
        </div>
    @endrole
    @role('Enseignants')
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <a class="btn btn-primary" href="{{ url('réclamation') }}">Creér un ticket</a>
        </div>
    @endrole
    </div>
</div>
@endsection
