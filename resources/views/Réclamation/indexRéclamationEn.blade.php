@extends('layouts.app')

@section('content')
<div class="container-fluid pb-5">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            @csrf
            @if ($message = Session::get('message'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    Création de nouveau Réclamation
                </div>
                <div class="card-body">
                    <form action="{{route('réclamation/enregistrer')}}" method="post">
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-4">
                                <label for="Matiére" class="col-4 col-form-label">Matiére :</label>
                                <input id="Matiére" name="matiére" type="text" class="form-control @error('matiére') is-invalid @enderror" value="{{ old('matiére') }}" autocomplete="matiére" placeholder="Matiére">
                                @error('matiére')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="select" class="col-form-label @error('séance') is-invalid @enderror" value="{{ old('séance') }}" autocomplete="séance" placeholder="Séance">
                                    Séance</label>
                                <select id="select" name="séance" class="custom-select">
                                    <option value="" disabled selected hidden>Choisir</option>
                                    <option value="Premier seance">Premier seance</option>
                                    <option value="Deuxième seance">Deuxième seance</option>
                                    <option value="Troisième seance">Troisième seance</option>
                                    <option value="Quatrième seance">Quatrième seance</option>
                                    <option value="cinquième seance">cinquième seance</option>
                                </select>
                                @error('séance')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="Labo" class="col-4 col-form-label">Labo:</label>

                                <input id="Labo" name="labo" type="text" class="form-control  @error('labo') is-invalid @enderror" value="{{ old('labo') }}" autocomplete="labo" placeholder="Labo">
                                @error('labo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table  table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Anomalie</th>
                                                <th>Numéro de poste</th>
                                                <th>Descripation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">Post infecté</th>
                                                <input type="hidden" name="propriétés[{{ 'Anomalie1' }}][nom]" value="Post infecté">
                                                <td>
                                                    <input type="number" id="quantity" name="propriétés[{{ 'Anomalie1' }}][quantity]" min="1">
                                                </td>
                                                <td><textarea id="textarea" name="propriétés[{{ 'Anomalie1' }}][description]" cols="40" rows="1" class="form-control"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Post Non Fonctionnel</th>
                                                <input type="hidden" name="propriétés[{{ 'Anomalie2' }}][nom]" value="Post Non Fonctionnel">
                                                <td>
                                                    <input type="number" id="quantity" name="propriétés[{{ 'Anomalie2' }}][quantity]" min="1">
                                                </td>
                                                <td><textarea id="textarea" name="propriétés[{{ 'Anomalie2' }}][description]" cols="40" rows="1" class="form-control"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Insuffisance Postes</th>
                                                <input type="hidden" name="propriétés[{{ 'Anomalie3' }}][nom]" value="Insuffisance Postes">
                                                <td>
                                                    <input type="number" id="quantity" name="propriétés[{{ 'Anomalie3' }}][quantity]" min="1">
                                                </td>
                                                <td><textarea id="textarea" name="propriétés[{{ 'Anomalie3' }}][description]" cols="40" rows="1" class="form-control"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Logiciels Manquants</th>
                                                <input type="hidden" name="propriétés[{{ 'Anomalie4' }}][nom]" value="Logiciels Manquants">
                                                <td>
                                                    <input type="number" id="quantity" name="propriétés[{{ 'Anomalie4' }}][quantity]" min="1">
                                                </td>
                                                <td><textarea id="textarea" name="propriétés[{{ 'Anomalie4' }}][description]" cols="40" rows="1" class="form-control"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Périphériques Manquants</th>
                                                <input type="hidden" name="propriétés[{{ 'Anomalie5' }}][nom]" value="Périphériques Manquants">
                                                <td>
                                                    <input type="number" id="quantity" name="propriétés[{{ 'Anomalie5' }}][quantity]" min="1">
                                                </td>
                                                <td><textarea id="textarea" name="propriétés[{{ 'Anomalie5' }}][description]" cols="40" rows="1" class="form-control"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Autres</th>
                                                <input type="hidden" name="propriétés[{{ 'Anomalie6' }}][nom]" value="Autres">
                                                <td>
                                                    <input type="number" id="quantity" name="propriétés[{{ 'Anomalie6' }}][quantity]" min="1">
                                                </td>
                                                <td><textarea id="textarea" name="propriétés[{{ 'Anomalie6' }}][description]" cols="40" rows="1" class="form-control"></textarea>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="form-group">
                                        <label for="textarea">Remarques :</label>
                                        <textarea id="textarea" name="remarques" cols="40" rows="2" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="form-label" for="priorite">Priorite</label>
                                <select name="priorite" id="priorite" class="form-control">
                                    <option value="normale">normale</option>
                                    <option value="haute">haute</option>
                                    <option value="urgent">urgent</option>
                                    <option value="critique">critique</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row d-flex justify-content-center">
                            <div class="btn-group ">
                                <button type="submit" value="Submit" class="btn btn-success">Enregistrer</button>
                                <button type="reset" value="Reset" class="btn btn-danger">Annuler</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="col-md-2">

        </div>
    </div>

    <div class="row mt-3">

        <div class="col-md-1"></div>


        <div class="col-md-10">

            <div class="card">
                <div class="card-header">
                    Votre Réclamations
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>

                                    <th scope="col">Priorité</th>
                                    <th scope="col">Etat</th>
                                    <th scope="col">Matiére</th>
                                    <th scope="col">Labo</th>
                                    <th scope="col">Remarques</th>
                                    <th scope="col">Anomalie</th>
                                    <th scope="col">Crée le :</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Réclamations as $Réclamation)
                                <tr>

                                    <td>{{ $Réclamation->priorite}}</td>
                                    <td>{{ $Réclamation->etat}}</td>
                                    <td>{{ $Réclamation->matiére}}</td>
                                    <td>{{ $Réclamation->labo}}</td>
                                    <td>{{ $Réclamation->remarques}}</td>

                                    <td>
                                        <table class="table table-bordered table-hover">
                                            <thead>

                                                <th scope="col">Anomalie</th>
                                                <th scope="col">Numéro de poste</th>
                                                <th scope="col">description</th>

                                            </thead>
                                            <tbody>
                                                @foreach ($Réclamation->propriétés as $property)
                                                @if (($property['quantity'])>0)
                                                <tr>

                                                    <td>{{ $property['nom'] }}</td>
                                                    <td>{{ $property['quantity'] }}</td>
                                                    <td>{{ $property['description'] }}</td>

                                                </tr>
                                                @endif
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </td>
                                    <td>{{ $Réclamation->created_at}}</td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">{{ $Réclamations->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection