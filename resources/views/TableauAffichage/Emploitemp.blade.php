@extends('layouts.app')

@section('content')

<div class="container">
    <div style="height:50%;">
        <iframe style="width: 100%; height:1000px;" src="https://docs.google.com/gview?url=http://7c10605a4b99.ngrok.io{{ $data->file_path }}&embedded=true"></iframe>
    </div>
</div>
@endsection