@extends('AdminPanel.layout')
<?php $y = 0; ?>
<?php $z = 0; ?>
@section('main')
<div class="container-fluid">
  <div class="row">
    @foreach($ExcelImportClass as $class)
    <div class="card m-5">
  <div class="card-body font-weight-bold">#{{$y++}} {{$class[2][4]}}</div>
</div>

    @endforeach
  </div>
  <div class="row">
    @for ($i =0 ; $i < count($ExcelImport); $i++) <table class="table table-bordered table-hover">
      
        <div class="font-weight-bold">#{{$z++}}</div>
      

      <thead>

        <tr>

          <th scope="col">N° Inscription</th>
          <th scope="col">CIN</th>
          <th scope="col">Nom Fr</th>
          <th scope="col">Prénom Fr</th>
          <th scope="col">Sexe</th>
          <th scope="col">Situation Familiale</th>
          <th scope="col">Date de naissance</th>
          <th scope="col">Lieu de naissance FR</th>
          <th scope="col">Statut</th>
          <th scope="col">Inscription</th>


        </tr>
      </thead>
      @foreach($ExcelImport[$i] as $Etu)
      <tbody>
        <td>
          {{($Etu['n_inscription'])}}
        </td>
        <td>
          {{($Etu['cin'])}}
        </td>
        <td>
          {{($Etu['nom_fr'])}}
        </td>
        <td>
          {{($Etu['prenom_fr'])}}
        </td>
        <td>
          {{($Etu['sexe'])}}
        </td>
        <td>
          {{($Etu['situation_familiale'])}}
        </td>
        <td>
          {{($Etu['date_de_naissance'])}}
        </td>
        <td>
          {{($Etu['lieu_de_naissance_fr'])}}
        </td>
        <td>
          {{($Etu['statut'])}}
        </td>
        <td>
          {{($Etu['inscription'])}}
        </td>

      </tbody>

      @endforeach

      </table>

@endfor
  </div>
</div>

@endsection