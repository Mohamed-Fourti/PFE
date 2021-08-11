@extends('AdminPanel.layout')

@section('main')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-4 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{$NewUsers}}</h3>

          <p class="white">Nouveaux utilisateurs</p>
        </div>
        <div class="icon">
          <i class="fa fa-user-plus" aria-hidden="true"></i>
        </div>
        <a href="{{ url('MarkNotificationAsRead','App\Notifications\NewUserNotification') }}" class="small-box-footer">Marquer la notification comme lue <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-4 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{$NewFV}}</h3>

          <p class="white">Nouveaux fiche de vœux</p>
        </div>
        <div class="icon">
          <i class="fa fas fa-file-alt" aria-hidden="true"></i>
        </div>
        <a href="{{ url('MarkNotificationAsRead','App\Notifications\ficheDeVœuxNotification') }}" class="small-box-footer">Marquer la notification comme lue <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-4 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{$NewRat}}</h3>

          <p class="white">Nouveaux Rattrapage</p>
        </div>
        <div class="icon">
          <i class="fas fa-sticky-note" aria-hidden="true"></i>
        </div>
        <a href="{{ url('MarkNotificationAsRead','App\Notifications\RattrapageNotification') }}" class="small-box-footer">Marquer la notification comme lue <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-4 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{$NewCont}}</h3>

          <p class="white">Nouveaux Formation</p>
        </div>
        <div class="icon">
          <i class="fas fa-atlas" aria-hidden="true"></i>
        </div>
        <a href="{{ url('MarkNotificationAsRead','App\Notifications\ColloqueScientifiqueNotification') }}" class="small-box-footer">Marquer la notification comme lue <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-4 col-6">
      <!-- small box -->
      <div class="small-box bg-primary">
        <div class="inner">
          <h3>{{$Newcoll}}</h3>

          <p class="white">Nouveaux Contact</p>
        </div>
        <div class="icon">
          <i class="fas fa-comment-alt" aria-hidden="true"></i>
        </div>
        <a href="{{ url('MarkNotificationAsRead','App\Notifications\ContactNotification') }}" class="small-box-footer">Marquer la notification comme lue <i class="fas fa-arrow-circle-right"></i></a>
      </div>

    </div>



  </div>
</div>
@endsection