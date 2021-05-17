@extends('layouts.app')

@section('content')
<div class="container-fluid pb-5">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          Fiche Réclamation N° {{ $Réclamations->id}}
        </div>
        <div class="card-body">
          <table class="table table-bordered table-hover">
            <tr>
              <td>Matiére :</td>
              <td>{{ $Réclamations->matiére}}</td>
            </tr>
            <tr>
              <td>Remarques :</td>
              <td>{{ $Réclamations->remarques}}</td>
            </tr>
            <tr>
              <td>Labo:</td>
              <td>{{ $Réclamations->séance}}</td>
            </tr>
            <tr>
              <td>Anomalies :</td>
              <td>
                                    <table class="table table-bordered table-hover">
                                        <thead>

                                            <th scope="col">Anomalie</th>
                                            <th scope="col">Numéro du poste</th>
                                            <th scope="col">description</th>

                                        </thead>
                                        <tbody>
                                            @foreach ($Réclamations->propriétés as $property)
                                            @if (isset($property['quantity']))
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
            </tr>
            <tr>
              <td>Priorité :</td>
              <td>{{ $Réclamations->priorite}}</td>
            </tr>
            <tr>
              <td>Etat :</td>
              <td>{{ $Réclamations->etat}}</td>
            </tr>
            <tr>
              <td>Crée le :</td>
              <td>{{ $Réclamations->created_at}}</td>
            </tr>
            <tr>
              <td>Utilisateur :</td>
              <td>{{ $Réclamations->user->nom}}</td>
            </tr>
          </table>
          <table class="table table-bordered table-hover">
            <tr>
              <td>Intervention du technicien</td>
              <td>Résultat de l'intervention</td>
              <td>technicien</td>
              <td>cause</td>
              <td>Date</td>
            </tr>
            @foreach ($traitements as $traitement)
            <tr>
              <td>
              @if($traitement->hardware != 'null')
                @foreach(json_decode($traitement->hardware) as $value)
                {{$value}},
                @endforeach
                @endif
                {{ $traitement->software }}
              </td>
              <td>{{ $traitement->résultat }}</td>
              <td>{{ $traitement->technicien->nom}}</td>
              <td>{{ $traitement->cause }}</td>
              <td>{{ $traitement->created_at }}</td>
            </tr>
            @endforeach
          </table>
          @if($Réclamations->etat!='traité')
          <a href="{{ url('réclamations/'.$Réclamations->id.'/traiter')}}" class="btn btn-primary">Traiter</a>
          @endif
        </div>
      </div>
    </div>

    <div class="col-md-2"></div>
  </div>

</div>

@endsection
