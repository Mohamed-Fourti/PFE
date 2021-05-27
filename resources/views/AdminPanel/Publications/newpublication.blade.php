@extends('AdminPanel.layout')

@section('main')
<div class="container">
    <form method="post" action="{{Route::currentRouteName() === 'publication.edit' ? route('publication.update', $datas->id) :route('publication.store')}}">
    @if(Route::currentRouteName() === 'publication.edit')
            @method('PUT')
        @endif
        @csrf
        <input name="id" type="text" hidden value="{{ isset($datas->id) ? $datas->id : '' }}" >

        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-7 col-6">

                <div class="card">
                    <div class="card-header">
                        Titre
                    </div>
                    <div class="card-body">
                        <input name="title" type="text" class="form-control" value="{{ isset($datas->title) ? $datas->title : '' }}" >

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-3 col-2">
                <div class="card">
                    <div class="card-header">
                        Publication
                    </div>
                    <div class="card-body">
                        <input name="active" id="Publié" type="checkbox" value="false">
                        <label for="Publié" class="" >Publié</label>
                    </div>
                </div>


            </div>              
      @if($categories)
            <div class="col-lg-4 col-md-4 col-sm-3 col-2">
                <div class="card">
                    <div class="card-header">
                        Publication
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="select" class="col-4 col-form-label">Select</label>
                            <div class="col-8">
                                <select id="select" name="categories_id" class="">
                                @foreach($categories as $categorie)
                                <option value="{{$categorie->id}}">{{$categorie->title}}</option>
                                @endforeach
                                

                               
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                      </div>

@else
<input name="categories_id" type="text" hidden value="{{ isset($datas->categories_id) ? $datas->categories_id : '' }}" >

       @endif

        </div>

        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-7 col-6">

                <div class="card">
                    <div class="card-header">
                        Extrait
                    </div>
                    <div class="card-body">
                        <textarea name="excerpt" cols="40" rows="2" class="form-control">{{ isset($datas->excerpt) ? $datas->excerpt : '' }}</textarea>

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
                        <input id="Titre SEO" name="seo_title" type="text" class="form-control" value="{{ isset($datas->seo_title) ? $datas->seo_title : '' }}">
                        <label for="META Keywords">META Keywords</label>
                        <input id="META Keywords" name="meta_description" type="text" class="form-control" value="{{ isset($datas->meta_description) ? $datas->meta_description : '' }}">
                        <label for="META Description">META Description</label>
                        <input id="META Description" name="meta_keywords" type="text" class="form-control" value="{{ isset($datas->meta_keywords) ? $datas->meta_keywords : '' }}">
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
                        <textarea id="editor1" name="body" rows="10" class="">{{ isset($datas->body) ? $datas->body : '' }}</textarea>

                    </div>
                </div>



                <div class="row justify-content-md-center" style="margin-top: -80px;">

                    <button type="submit" class="btn btn-primary ">cree</button>
                </div>

            </div>


            <div class="col-lg-4 col-md-4 col-sm-7 col-6">
                <div class="card">
                    <div class="card-header">
                        slug
                    </div>
                    <div class="card-body">
                        <input name="slug" type="text" class="form-control" value="{{ isset($datas->slug) ? $datas->slug : '' }}" >
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Image
                    </div>
                    <div class="card-body">

                        <div id="holder" class="text-center" style="margin-bottom:15px;">
                            @isset($datas)
                            <img style="width:100%;" src="{{ getImage($datas, true) }}" alt="">
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

@endpush