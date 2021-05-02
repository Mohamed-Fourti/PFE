@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          Traitement
        </div>
        <div class="card-body">

          <form action="{{route('traitement/enregistrer')}}" method="post">
            @csrf
            <input type="hidden" name="réclamation_id" value="{{$Réclamation->id}}">
            <div class="form-group row">
              <label class="col-4">Hardware</label>
              <div class="col-8">
                <div class="custom-control custom-checkbox custom-control-inline">
                  <input name="hardware[]" id="Hardware_0" type="checkbox" class="custom-control-input" value="Matériel Ajouté">
                  <label for="Hardware_0" class="custom-control-label">Matériel Ajouté</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                  <input name="hardware[]" id="Hardware_1" type="checkbox" class="custom-control-input" value="Matériel remplacé">
                  <label for="Hardware_1" class="custom-control-label">Matériel remplacé</label>
                </div>
                <div class="custom-control custom-checkbox custom-control-inline">
                  <input name="hardware[]" id="Hardware_2" type="checkbox" class="custom-control-input" value="Matériel réparé">
                  <label for="Hardware_2" class="custom-control-label">Matériel réparé</label>
                </div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-4 col-form-label" for="textarea">Software</label>
              <div class="col-8">
                <textarea id="textarea" name="software" placeholder="Intervention..." cols="40" rows="5" class="form-control" aria-describedby="textareaHelpBlock"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label for="résultat " class="col-4 col-form-label">Résultat de l'intervention</label>
              <div class="col-8">
                <select id="résultat" name="résultat" class="custom-select">
                  <option value="avec succès">Avec succès</option>
                  <option value="Non résolu">Non résolu</option>
                </select>
              </div>
            </div>
            <div style='display:none;' class="form-group row show">
              <label class="col-4 col-form-label" for="cause">A cause de :</label>
              <div class="col-8">
                <input id="cause" name="cause" type="text" class="form-control">
              </div>
            </div>
            <div class="form-group row ">
              <div class="offset-4 col-8">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="col-md-2">

    </div>
  </div>
</div>

@endsection
@push('scripts')
<script>
  $("#résultat").change(function() {

    if (this.value == ("Non résolu")) {
      $(".show").show();
    } else {
      $(".show").hide();
    }

  });
  $("#résultat").trigger("change");
</script>

@endpush