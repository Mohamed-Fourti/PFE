@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                <table class="table table-bordered">
    <tr>
      <td>Total des tickets :<span class="badge">{{ $statistiques['total'] }}</span></td>
    </tr>
    <tr>
      <td>
        <table class="table table-bordered table-striped">
          <tr>
            <td colspan="2"> <b>Etats</b> </td>
          </tr>
          <tr>
            <td>Création</td>
            <td><span class="badge">{{ $statistiques['creation']}}</span></td>
          </tr>
          <tr>
            <td>En cours</td>
            <td><span class="badge">{{ $statistiques['encours']}}</span></td>
          </tr>
          <tr>
            <td>Traité</td>
            <td><span class="badge">{{ $statistiques['traité']}}</span></td>
          </tr>
        </table>

      </td>
      
    </tr>
  </table>
                </div>

            </div>
        </div>

    </div>
    <div class="row mt-2">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <diFv class="card">
                <div class="card-header">
                    Votre Réclamations
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">Priorité</th>
                                <th scope="col">Etat</th>
                                <th scope="col">Crée le :</th>
                                <th scope="col">Utilisateur</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($Réclamations as $Réclamation)
                            <tr>
                                <td>{{ $Réclamation->priorite}}</td>
                                <td>{{ $Réclamation->etat}}</td>
                                <td>{{ $Réclamation->created_at}}</td>
                                <td>{{ $Réclamation->user->nom}}</td>
                                <td><a href="{{url('réclamations/'.$Réclamation->id.'/consulter')}}"><button type="submit" class="btn btn-primary">Consulter</button></a></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">{{ $Réclamations->links() }}</div>

                </div>
        </div>
    </div>

</div>

@endsection
