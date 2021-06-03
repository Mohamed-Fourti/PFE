@extends('layouts.app')

@section('content')
<div class="form-group row">
  <div class="col-md-1"></div>

  <div class="col-md-10">
  <form action="{{route('fiche-De-Vœux/enregistrer')}}" method="post" >
  @csrf

    <div class="card">
      <div class="card-body">
      <label for="gsm" class="col-4 col-form-label">GSM :</label>
        <input id="gsm" name="gsm" type="text" class="form-control">
      <input id="" name="sem" type="text" hidden value="{{ $semid }}">
        <label for="select" class="col-4 col-form-label">Matiere</label>
        <select id="select" name="Matieres[{{ 'Matieres-1' }}][Matiere]" class="custom-select">
          @foreach ($Matieres as $Matiere)
          <option value="" disabled selected hidden>Choose</option>
          <option  value="{{ $Matiere['class'] }}:{{ $Matiere['appelation'] }}">{{ $Matiere['class'] }}-{{ $Matiere['appelation'] }}</option>
          @endforeach
        </select>
        <label for="select" class="col-4 col-form-label">Matiere</label>
        <select id="select" name="Matieres[{{ 'Matieres-2' }}][class]" class="custom-select">
          @foreach ($Matieres as $Matiere)
          <option value="" disabled selected hidden>Choose</option>
          <option value="{{ $Matiere['class'] }}:{{ $Matiere['appelation'] }}">{{ $Matiere['class'] }}-{{ $Matiere['appelation'] }}</option>
          @endforeach
        </select>
        <label for="select" class="col-4 col-form-label">Matiere</label>
        <select id="select" name="Matieres[{{ 'Matieres-3' }}][class]" class="custom-select">
          @foreach ($Matieres as $Matiere)
          <option value="" disabled selected hidden>Choose</option>
          <option value="{{ $Matiere['class'] }}:{{ $Matiere['appelation'] }}">{{ $Matiere['class'] }}-{{ $Matiere['appelation'] }}</option>
          @endforeach
        </select>
        <label for="select" class="col-4 col-form-label">Matiere</label>
        <select id="select" name="Matieres[{{ 'Matieres-4' }}][class]" class="custom-select">
          @foreach ($Matieres as $Matiere)
          <option value="" disabled selected hidden>Choose</option>
          <option value="{{ $Matiere['class'] }}:{{ $Matiere['appelation'] }}">{{ $Matiere['class'] }}-{{ $Matiere['appelation'] }}</option>
          @endforeach
        </select>
        <label for="select" class="col-4 col-form-label">Matiere</label>
        <select id="select" name="Matieres[{{ 'Matieres-5' }}][class]" class="custom-select">
          @foreach ($Matieres as $Matiere)
          <option value="" disabled selected hidden>Choose</option>
          <option value="{{ $Matiere['class'] }}:{{ $Matiere['appelation'] }}">{{ $Matiere['class'] }}-{{ $Matiere['appelation'] }}</option>
          @endforeach
        </select>
        @if ($sem=='S1')
        <label for="chargeS1" class="col-4 col-form-label">Votre charge horaire du Semestre 1 :</label>
        <input id="chargeS1" name="chargeS1" type="text" class="form-control">
        @else
        <label for="chargeS2" class="col-4 col-form-label">Votre charge horaire du Semestre 2 :</label>
        <input id="chargeS2" name="chargeS2" type="text" class="form-control">
        @endif


      </div>
    </div>
    <div class=" mt-2">

      <div class="card">
        <div class="card-body">
          <h5>Jours de travail (Combinaison 1 )</h5>
          <p>Cochez les jours de travail.</p>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">Lundi</th>
                <th scope="col">Mardi</th>
                <th scope="col">Mercredi</th>
                <th scope="col">Vendredi</th>
                <th scope="col">Samedi</th>
                <th scope="col">Dimanche</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">Matin</th>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours1[]" id="_0" type="checkbox" class="custom-control-input" value="Lundi_Matin">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours1[]" id="_0" type="checkbox" class="custom-control-input" value="Mardi_Matin">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours1[]" id="_0" type="checkbox" class="custom-control-input" value="Mercredi_Matin">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours1[]" id="_0" type="checkbox" class="custom-control-input" value="Vendredi_Matin">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours1[]" id="_0" type="checkbox" class="custom-control-input" value="Samedi_Matin">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours1[]" id="_0" type="checkbox" class="custom-control-input" value="Dimanche">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>

              </tr>
              <tr>
                <th scope="row">Après Midi </th>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours1[]" id="_0" type="checkbox" class="custom-control-input" value="Lundi_Après_Midi">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours1[]" id="_0" type="checkbox" class="custom-control-input" value="Mardi_Après_Midi">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours1[]" id="_0" type="checkbox" class="custom-control-input" value="Mercredi_Après_Midi">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours1[]" id="_0" type="checkbox" class="custom-control-input" value="Jeudi_Après_Midi">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours1[]" id="_0" type="checkbox" class="custom-control-input" value="Vendredi_Après_Midi">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours1[]" id="_0" type="checkbox" class="custom-control-input" value="Samedi_Après_Midi">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>
              </tr>
              <tr>
                <th scope="row">Journée entière</th>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours1[]" id="_0" type="checkbox" class="custom-control-input" value="Lundi_Journée_entière">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours1[]" id="_0" type="checkbox" class="custom-control-input" value="Mardi_Journée_entière">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours1[]" id="_0" type="checkbox" class="custom-control-input" value="Mercredi_Journée_entière">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours1[]" id="_0" type="checkbox" class="custom-control-input" value="Jeudi_Journée_entière">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours1[]" id="_0" type="checkbox" class="custom-control-input" value="Vendredi_Journée_entière">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours1[]" id="_0" type="checkbox" class="custom-control-input" value="Samedi_Journée_entière">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      </div>
      <div class=" mt-2">

      <div class="card">
        <div class="card-body">
          <h5>Jours de travail (Combinaison 2 )</h5>
          <p>Cochez les jours de travail.</p>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">Lundi</th>
                <th scope="col">Mardi</th>
                <th scope="col">Mercredi</th>
                <th scope="col">Vendredi</th>
                <th scope="col">Samedi</th>
                <th scope="col">Dimanche</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">Matin</th>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours2[]" id="_0" type="checkbox" class="custom-control-input" value="Lundi_Matin">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours2[]" id="_0" type="checkbox" class="custom-control-input" value="Mardi_Matin">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours2[]" id="_0" type="checkbox" class="custom-control-input" value="Mercredi_Matin">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours2[]" id="_0" type="checkbox" class="custom-control-input" value="Vendredi_Matin">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours2[]" id="_0" type="checkbox" class="custom-control-input" value="Samedi_Matin">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours2[]" id="_0" type="checkbox" class="custom-control-input" value="Dimanche">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>

              </tr>
              <tr>
                <th scope="row">Après Midi </th>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours2[]" id="_0" type="checkbox" class="custom-control-input" value="Lundi_Après_Midi">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours2[]" id="_0" type="checkbox" class="custom-control-input" value="Mardi_Après_Midi">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours2[]" id="_0" type="checkbox" class="custom-control-input" value="Mercredi_Après_Midi">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours2[]" id="_0" type="checkbox" class="custom-control-input" value="Jeudi_Après_Midi">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours2[]" id="_0" type="checkbox" class="custom-control-input" value="Vendredi_Après_Midi">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours2[]" id="_0" type="checkbox" class="custom-control-input" value="Samedi_Après_Midi">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>
              </tr>
              <tr>
                <th scope="row">Journée entière</th>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours2[]" id="_0" type="checkbox" class="custom-control-input" value="Lundi_Journée_entière">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours2[]" id="_0" type="checkbox" class="custom-control-input" value="Mardi_Journée_entière">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours2[]" id="_0" type="checkbox" class="custom-control-input" value="Mercredi_Journée_entière">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours2[]" id="_0" type="checkbox" class="custom-control-input" value="Jeudi_Journée_entière">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours2[]" id="_0" type="checkbox" class="custom-control-input" value="Vendredi_Journée_entière">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                    <input name="jours2[]" id="_0" type="checkbox" class="custom-control-input" value="Samedi_Journée_entière">
                    <label for="_0" class="custom-control-label"></label>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class=" mt-2">

    <div class="card">
  <div class="card-body">
  </div>
  <label for="remarques" class="col-4 col-form-label">Remarques :</label>
        <input id="remarques" name="remarques" type="text" class="form-control">
        <button name="submit" type="submit" class="btn btn-primary">Submit</button>

</div>
</div>

    </form>

  </div>
</div>

@endsection
@push('scripts')

<script>
 

 $(document).ready(function(){
$('select').on('change', function(event ) {
   var prevValue = $(this).data('previous');
$('select').not(this).find('option[value="'+prevValue+'"]').show();    
   var value = $(this).val();
  $(this).data('previous',value); $('select').not(this).find('option[value="'+value+'"]').hide();
});
});

</script>


@endpush