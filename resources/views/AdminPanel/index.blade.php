@extends('AdminPanel.layout')

@section('main')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-4 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>14</h3>

          <p class="white">Nouveaux utilisateurs</p>
        </div>
        <div class="icon">
          <i class="fa fa-user-plus" aria-hidden="true"></i>
        </div>
        <a href="#" class="small-box-footer">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-4 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>3</h3>

          <p class="white">Nouveaux fiche de vœux</p>
        </div>
        <div class="icon">
          <i class="fa fas fa-file-alt" aria-hidden="true"></i>
        </div>
        <a href="#" class="small-box-footer">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-4 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>2</h3>

          <p class="white">Nouveaux Rattrapage</p>
        </div>
        <div class="icon">
          <i class="fas fa-sticky-note" aria-hidden="true"></i>
        </div>
        <a href="#" class="small-box-footer">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-4 col-6">
    </div>
    <div class="col-lg-4 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>4</h3>

          <p class="white">Nouveaux Contact</p>
        </div>
        <div class="icon">
          <i class="fas fa-comment-alt" aria-hidden="true"></i>
        </div>
        <a href="#" class="small-box-footer">Plus d'informations <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>



  </div>
</div>
@endsection