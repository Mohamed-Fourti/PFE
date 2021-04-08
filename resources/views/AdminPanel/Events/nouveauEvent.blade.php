@extends('AdminPanel.layout')

@section('main')
<form>
    <div class="mb-3">
      <label for="titre" class="form-label">Titre</label>
      <input type="text" class="form-control" id="titre" placeholder="Titre...">
    </div>
    <div class="mb-3">
      <label for="img" class="form-label">Image</label>
      <input class="form-control" type="file" id="img">
    </div>
    <div class="mb-3">
      <label for="dd" class="form-label">Date de Debut</label>
      <input type="date" class="form-control" id="dd" placeholder="Debut evenement">
    </div>
    <div class="mb-3">
      <label for="df" class="form-label">Date de Fin</label>
      <input type="date" class="form-control" id="df" placeholder="Fin evenement">
    </div>
    <div class="mb-3">
      <label for="descr" class="form-label">Description</label>
      <textarea class="form-control" id="descr" rows="5"></textarea>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary mb-3">Créer Evenement</button>
      </div>
</form>

@endsection