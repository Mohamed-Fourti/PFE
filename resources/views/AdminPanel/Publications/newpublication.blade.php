@extends('AdminPanel.layout')

@section('main')
<div class="container">
    <form method="post" action="{{Route::currentRouteName() === 'publication.edit' ? route('publication.update', $datas->id) :route('publication.store')}}">
        @if(Route::currentRouteName() === 'publication.edit')
        @method('PUT')
        @endif
        @csrf
        <input name="id" type="text" hidden value="{{ isset($datas->id) ? $datas->id : '' }}">

        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-7 col-6">

                <div class="card">
                    <div class="card-header">
                        Titre
                    </div>
                    <div class="card-body">
                        <input name="title" id="title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{ isset($datas->title) ? $datas->title : '' }}" placeholder="Titre">
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
                        Publication
                    </div>
                    <div class="card-body">
                        @if($active)
                        @if($datas->active==1 )


                        <input name="active" id="Publié" type="checkbox" value="false" checked>
                        <label for="Publié" class="">Publié</label>
                        @else
                        <input name="active" id="Publié" type="checkbox" value="false">
                        <label for="Publié" class="">Publié</label>
                        @endif

                        @else
                        <input name="active" id="Publié" type="checkbox" value="false">
                        <label for="Publié" class="">Publié</label>
                        @endif

                    </div>
                </div>


            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-2">
                <div class="card">
                    <div class="card-header">
                        Categories
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-12">
                                @if($categories)
                                <select id="categories" name="categories_id" class="form-control">

                                    @foreach($categories as $categorie)
                                    <option value="{{$categorie->id}}">{{$categorie->title}}</option>
                                    @endforeach
                                </select>

                                @else
                                <select id="categories" name="categories_id" class="form-control" disabled>

                                    <option value="{{$datas->id}}">{{ $datas->categories->title }}</option>
                                </select>

                                @endif


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
                                <input id="disable1" name="date_début" type="datetime-local" value="{{ isset($datas->date_début) ? Carbon\Carbon::parse($datas->date_début)->format('Y-m-d')."T".Carbon\Carbon::parse($datas->date_début)->format('H:i') : Carbon\Carbon::now()->format('Y-m-d')."T".Carbon\Carbon::now()->format('H:i') }}" class="form-control">
    
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
                                <input id="disable2" name="date_finale" type="datetime-local" value="{{ isset($datas->date_finale) ? Carbon\Carbon::parse($datas->date_finale)->format('Y-m-d')."T".Carbon\Carbon::parse($datas->date_finale)->format('H:i') : Carbon\Carbon::now()->format('Y-m-d')."T".Carbon\Carbon::now()->format('H:i') }}" class="form-control" min="{{Carbon\Carbon::now()->format('Y-m-d')."T".Carbon\Carbon::now()->format('H:i')}}">
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
                                <input id="disable3" name="lieu" type="text" class="form-control @error('lieu') is-invalid @enderror" value="{{ isset($datas->lieu) ? $datas->lieu : 'Iset Djerba' }}">
                                @error('lieu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
                                <input  id="enabled1" name="formateur" type="text" class="form-control" value="{{ isset($datas->formateur) ? $datas->formateur : '' }}" disabled placeholder="Formateur">
         
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
                                <input id="enabled2" name="durée" type="text" class="form-control" value="{{ isset($datas->durée) ? $datas->durée : '' }}" disabled placeholder="Durée">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-2">
                <div class="card">
                    <div class="card-header">
                    Nombre de seances
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-12">
                                <input id="enabled3" name="Nbseance" type="text" class="form-control" value="{{ isset($datas->Nbseance) ? $datas->Nbseance : '' }}" disabled placeholder="Nombre de séances">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-7 col-6">

                <div class="card">
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
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-7 col-6">

                <div class="card" style="top: -150px;">
                    <div class="card-header">
                        Contenu
                    </div>
                    <div class="card-body">
                        <textarea id="editor1" name="body" rows="10" class="@error('body') is-invalid @enderror" >{{ isset($datas->body) ? $datas->body : '' }}</textarea>
                            @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                    </div>
                </div>



                <div class="row justify-content-md-center" style="margin-top: -80px;">

                    <button type="submit" class="btn btn-primary ">Créer</button>
                </div>

            </div>


            <div class="col-lg-4 col-md-4 col-sm-7 col-6">
                <div class="card">
                    <div class="card-header">
                        slug
                    </div>
                    <div class="card-body">
                        <input name="slug" id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" value="{{ isset($datas->slug) ? $datas->slug : '' }}" placeholder="Slug">
                            @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Image
                    </div>
                    <div class="card-body">

                        <div  id="holder" class="text-center" style="margin-bottom:15px; ">
                            @isset($datas)
                            <img  style="width:100%;" src="{{ getImage($datas, true) }}" alt="">
                            @endisset
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <a id="lfm" data-input="image" data-preview="holder" class="btn btn-primary text-white" class="btn btn-outline-secondary" type="button">Button</a>
                            </div>
                            <input id="image" class="form-control" type="text" name="image" value="{{ old('image', isset($datas) ? getImage($datas) : '') }}">
                        </div>
                    </div>
                </div>

            </div>

        </div>


    </form>
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