@extends('AdminPanel.layout')

@section('main')
<div class="container-fluid ">
  <div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-12">
      <div class="card">
        <div class="card-header">
          Valider rattrapage
        </div>
        <div class="card-body">
          <table class="table table-bordered">
             <tr>
              <td>Enseignants :</td>
              <td>{{ $data->user->nom}}</td>
            </tr>
            <tr>
              <td>Classe</td>
              <td>{{ $data->classe }}</td>
            </tr>
            <tr>
              <td>Matière</td>
              <td>{{ $data->matiere }}</td>
            </tr>
            <tr>
              <td>Motif de remplacement</td>
              <td>{{ $data->motifRemplace }}</td>
            </tr>
            <tr>
              <td>Jour à rattraper</td>
              <td>{{ $data->jour1 }}</td>
            </tr>
            <tr>
              <td>Seance à rattraper</td>
              <td>{{ $data->seance1 }}</td>
            </tr>
            <tr>
              <td>Nouveau jour</td>
              <td>{{ $data->jour2 }}</td>
            </tr>
            <tr>
              <td>Nouveau seance</td>
              <td>{{ $data->seance2 }}</td>
            </tr>
            <tr>
            <td>Salle/Labo</td>
            <td>{{ $data->salle }}</td>
            </tr>
            <tr>
            <td>Date de création</td>
            <td>{{ $data->created_at }}</td>
            </tr>
            </tbody>

          </table><br><br>

            <div class="col text-center">
                <a href="{{ route('rattrapages.pdf',$data->id) }}" Style ="width:200px; height:50px;" class="btn btn-primary">Valider</a>
            </div>


        </div>
      </div>
    </div>

  </div>

</div>

@endsection