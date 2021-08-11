@extends('layouts.app')

@section('content')


<div class="container mb-4">
    <div class="card border-primary">
        <div class="card-body ">
            @if ($message = Session::get('msg'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <form method="post" action="{{route('PublicationEn.store')}}">
                @csrf
                <input name="active" type="checkbox" value="false" hidden>

                <div class="row p-4">
                    <div class="col-lg-8 col-md-8 col-sm-7 col-6 pb-4">

                        <div class="card">
                            <div class="card-header">
                                Titre
                            </div>
                            <div class="card-body">
                                <input name="title" id="title" type="text" class="form-control @error('title') is-invalid @enderror" value="" placeholder="Titre">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-3 col-2">
                        <div class="card">
                            <div class="card-header">
                                slug
                            </div>
                            <div class="card-body">
                                <input readonly name="slug" id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" value="" placeholder="Slug">
                                @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-2">
                        <div class="card">
                            <div class="card-header">
                                Class
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-12">
                                        @if($classes)
                                        <select id="class" name="class" class="form-control">
                                            <option value="" disabled selected>Choisir un classe</option>

                                            @foreach($classes as $class)
                                            <option value="{{$class->id}}">{{$class->class}}</option>
                                            @endforeach
                                        </select>

                                        @else
                                        <select id="class" name="list_classe_id" class="form-control" disabled>

                                            <option value="{{$datas->classes->class}}">{{ $datas->classes->class }}</option>
                                        </select>

                                        @endif


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-3 col-2 pb-4">
                        <div class="card">
                            <div class="card-header">
                                Categories
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <select id="categories" name="categories_id" class="form-control">

                                            @foreach($categories as $categorie)
                                            <option value="{{$categorie->id}}">{{$categorie->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-3 col-2">
                        <div class="card">
                            <div class="card-header">
                                Date Début
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <input id="disable1" name="date_début" type="datetime-local" value="{{ Carbon\Carbon::now()->format('Y-m-d')."T".Carbon\Carbon::now()->format('H:i') }}" class="form-control">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-2">
                        <div class="card">
                            <div class="card-header">
                                Date de fin
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <input id="disable2" name="date_finale" type="datetime-local" value="{{  Carbon\Carbon::now()->format('Y-m-d')."T".Carbon\Carbon::now()->format('H:i') }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-2">
                        <div class="card">
                            <div class="card-header">
                                Lieu
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <input id="disable3" name="lieu" type="text" class="form-control @error('lieu') is-invalid @enderror" value="{{ 'Iset Djerba' }}">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-2">
                        <div class="card">
                            <div class="card-header">
                                Formateur
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <input id="enabled1" name="formateur" type="text" class="form-control" value="{{ isset($datas->formateur) ? $datas->formateur : '' }}" disabled>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-2">
                        <div class="card">
                            <div class="card-header">
                                Durée
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <input id="enabled2" name="durée" type="text" class="form-control" value="{{ isset($datas->durée) ? $datas->durée : '' }}" disabled>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-2">
                        <div class="card">
                            <div class="card-header">
                                Nombre de séances
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <input id="enabled3" name="Nbseance" type="text" class="form-control" value="{{ isset($datas->Nbseance) ? $datas->Nbseance : '' }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row p-4">
                    <div class="col-lg-8 col-md-8 col-sm-7 col-6">

                        <div class="card ">
                            <div class="card-header">
                                Extrait
                            </div>
                            <div class="card-body">
                                <textarea name="excerpt" cols="40" rows="2" class="form-control @error('excerpt') is-invalid @enderror" placeholder="Extrait">{{ isset($datas->excerpt) ? $datas->excerpt : '' }}</textarea>
                                @error('excerpt')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-3 col-2">

                        <div class="card">
                            <div class="card-header">
                                SEO
                            </div>
                            <div class="card-body">
                                <label for="Titre SEO">Titre SEO</label>
                                <input id="Titre SEO" name="seo_title" type="text" class="form-control @error('seo_title') is-invalid @enderror" value="{{ isset($datas->seo_title) ? $datas->seo_title : '' }}" placeholder="Seo Title">
                                @error('seo_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <label for="META Keywords">META Keywords</label>
                                <input id="META Keywords" name="meta_keywords" type="text" class="form-control @error('meta_keywords') is-invalid @enderror" value="{{ isset($datas->meta_description) ? $datas->meta_description : '' }}" placeholder="Meta Description">
                                @error('meta_keywords')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <label for="META Description">META Description</label>
                                <input id="META Description" name="meta_description" type="text" class="form-control @error('meta_description') is-invalid @enderror" value="{{ isset($datas->meta_keywords) ? $datas->meta_keywords : '' }}" placeholder="Meta Keywords">
                                @error('meta_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                    </div>

                </div>
                <div class="row p-4">
                    <div class="col-lg-8 col-md-8 col-sm-7 col-6">

                        <div class="card" style="top: -150px;">
                            <div class="card-header">
                                Contenu
                            </div>
                            <div class="card-body">
                                <textarea id="editor1" name="body" rows="10" class="@error('body') is-invalid @enderror">{{ isset($datas->body) ? $datas->body : '' }}</textarea>
                                @error('body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>





                    </div>


                    <div class="col-lg-4 col-md-4 col-sm-7 col-6">

                        <div class="card">
                            <div class="card-header">
                                Image
                            </div>
                            <div class="card-body">

                                <div id="holder" class="text-center" style="margin-bottom:15px; ">
                                    @isset($datas)
                                    <img style="width:100%;" src="{{ getImage($datas, true) }}" alt="">
                                    @endisset
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <a id="lfm" data-input="image" data-preview="holder" class="btn btn-primary text-white" class="btn btn-outline-secondary" type="button">Image</a>
                                    </div>
                                    <input id="image" class="form-control" type="text" name="image" value="{{ old('image', isset($datas) ? getImage($datas) : '') }}">
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-12" style="top:-100px;">

                    <div class="row d-flex justify-content-center">

                        <button type="submit" class="btn btn-primary ">Créer</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection

@push('scripts')

@include('AdminPanel.editorScript')
<script>
    $(document).on('change', '#categories', function() {
        var shouldEnable = $(this).val() == '3';
        $('#disable1').prop('disabled', shouldEnable);
        $('#disable2').prop('disabled', shouldEnable);
        $('#disable3').prop('disabled', shouldEnable);

        var foramation = $(this).val() != "2";
        $('#enabled1').prop('disabled', foramation);
        $('#enabled2').prop('disabled', foramation);
        $('#enabled3').prop('disabled', foramation);
    });

    $(function() {
        $('#slug').keyup(function() {
            $(this).val(getSlug($(this).val()))
        })

        $('#title').keyup(function() {
            $('#slug').val(getSlug($(this).val()))
        })

        $('#title').keyup(function() {
            $('#slug').val(getSlug($(this).val()))
        })
    });
</script>


@endpush