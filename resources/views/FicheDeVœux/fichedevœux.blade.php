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
        @error('gsm')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror

      <input id="" name="sem" type="text" hidden value="{{ $semid }}">
        <label for="select" class="col-4 col-form-label">Matiere</label>
        <select id="select" name="Matieres[{{ 'Matieres-1' }}][Matiere]" class="custom-select">
          @foreach ($Matieres as $Matiere)
          <option value="" disabled selected hidden>Choose</option>
          <option  value="{{ $Matiere['class'] }}:{{ $Matiere['appelation'] }}">{{ $Matiere['class'] }}-{{ $Matiere['appelation'] }}</option>
          @endforeach

        </select>
        @error('Matieres')
           <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="select" class="col-4 col-form-label">Matiere</label>
        <select id="select" name="Matieres[{{ 'Matieres-2' }}][class]" class="custom-select">
          @foreach ($Matieres as $Matiere)
          <option value="" disabled selected hidden>Choose</option>
          <option value="{{ $Matiere['class'] }}:{{ $Matiere['appelation'] }}">{{ $Matiere['class'] }}-{{ $Matiere['appelation'] }}</option>
          @endforeach
        </select>
        @error('Matieres')
           <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="select" class="col-4 col-form-label">Matiere</label>
        <select id="select" name="Matieres[{{ 'Matieres-3' }}][class]" class="custom-select">
          @foreach ($Matieres as $Matiere)
          <option value="" disabled selected hidden>Choose</option>
          <option value="{{ $Matiere['class'] }}:{{ $Matiere['appelation'] }}">{{ $Matiere['class'] }}-{{ $Matiere['appelation'] }}</option>
          @endforeach
        </select>
        @error('Matieres')
           <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="select" class="col-4 col-form-label">Matiere</label>
        <select id="select" name="Matieres[{{ 'Matieres-4' }}][class]" class="custom-select">
          @foreach ($Matieres as $Matiere)
          <option value="" disabled selected hidden>Choose</option>
          <option value="{{ $Matiere['class'] }}:{{ $Matiere['appelation'] }}">{{ $Matiere['class'] }}-{{ $Matiere['appelation'] }}</option>
          @endforeach
        </select>
        @error('Matieres')
           <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="select" class="col-4 col-form-label">Matiere</label>
        <select id="select" name="Matieres[{{ 'Matieres-5' }}][class]" class="custom-select">
          @foreach ($Matieres as $Matiere)
          <option value="" disabled selected hidden>Choose</option>
          <option value="{{ $Matiere['class'] }}:{{ $Matiere['appelation'] }}">{{ $Matiere['class'] }}-{{ $Matiere['appelation'] }}</option>
          @endforeach
        </select>
        @error('Matieres')
           <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @if ($sem=='S1')
        <label for="chargeS1" class="col-4 col-form-label">Votre charge horaire du Semestre 1 :</label>
        <input id="chargeS1" name="chargeS1" type="text" class="form-control">
        @error('chargeS1')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @else
        <label for="chargeS2" class="col-4 col-form-label">Votre charge horaire du Semestre 2 :</label>
        <input id="chargeS2" name="chargeS2" type="text" class="form-control">
        @error('chargeS2')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

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
                <th scope="col">Jeudi</th>
                <th scope="col">Vendredi</th>
                <th scope="col">Samedi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">Matin</th>
                <td>
                  <div class="custom-control custom-checkbox">
                    <div class="checkbox">
                      <label style="font-size: 2.5em">
                          <input name="jours1[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Lundi_Matin">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                  <div class="checkbox">
                      <label style="font-size: 2.5em">
                          <input name="jours1[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Mardi_Matin">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                  <div class="checkbox">
                      <label style="font-size: 2.5em">
                          <input name="jours1[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Mercredi_Matin">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                  <div class="checkbox">
                      <label style="font-size: 2.5em">
                          <input name="jours1[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Jeudi_Matin">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                  <div class="checkbox">
                      <label style="font-size: 2.5em">
                          <input name="jours1[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Vendredi_Matin">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                  <div class="checkbox">
                      <label style="font-size: 2.5em">
                          <input name="jours1[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Samedi_Matin">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>

              </tr>
              <tr>
                <th scope="row">Après Midi </th>
                <td>
                  <div class="custom-control custom-checkbox">
                  <div class="checkbox">
                      <label style="font-size: 2.5em">
                          <input name="jours1[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Lundi_Après_Midi">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                  <div class="checkbox">
                      <label style="font-size: 2.5em">
                          <input name="jours1[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Mardi_Après_Midi">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                  <div class="checkbox">
                      <label style="font-size: 2.5em">
                          <input name="jours1[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Mercredi_Après_Midi">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                  <div class="checkbox">
                      <label style="font-size: 2.5em">
                          <input name="jours1[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Jeudi_Après_Midi">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                  <div class="checkbox">
                      <label style="font-size: 2.5em">
                          <input name="jours1[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Vendredi_Après_Midi">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                  <div class="checkbox">
                      <label style="font-size: 2.5em">
                          <input name="jours1[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Samedi_Après_Midi">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <th scope="row">Journée entière</th>
                <td>
                  <div class="custom-control custom-checkbox">
                  <div class="checkbox">
                      <label style="font-size: 2.5em">
                          <input name="jours1[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Lundi_Journée_entière">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                  <div class="checkbox">
                      <label style="font-size: 2.5em">
                          <input name="jours1[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Mardi_Journée_entière">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                  <div class="checkbox">
                      <label style="font-size: 2.5em">
                          <input name="jours1[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Merecredi_Journée_entière">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                  <div class="checkbox">
                      <label style="font-size: 2.5em">
                          <input name="jours1[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Jeudi_Journée_entière">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                  <div class="checkbox">
                      <label style="font-size: 2.5em">
                          <input name="jours1[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Vendredi_Journée_entière">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                  <div class="checkbox">
                      <label style="font-size: 1.5em">
                          <input name="jours1[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Samedi_Journée_entière">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          </table>
          @error('jours1')
           <div class="alert alert-danger">{{ $message }}</div>
        @enderror
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
                <th scope="col">Jeudi</th>
                <th scope="col">Vendredi</th>
                <th scope="col">Samedi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">Matin</th>
                <td>
                  <div class="custom-control custom-checkbox">
                    <div class="checkbox">
                      <label style="font-size: 2.5em">
                          <input name="jours2[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Lundi_Matin">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                  <div class="checkbox">
                      <label style="font-size: 2.5em">
                          <input name="jours2[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Mardi_Matin">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                  <div class="checkbox">
                      <label style="font-size: 2.5em">
                          <input name="jours2[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Mercredi_Matin">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                  <div class="checkbox">
                      <label style="font-size: 2.5em">
                          <input name="jours2[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Jeudi_Matin">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                  <div class="checkbox">
                      <label style="font-size: 2.5em">
                          <input name="jours2[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Vendredi_Matin">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                  <div class="checkbox">
                      <label style="font-size: 2.5em">
                          <input name="jours2[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Samedi_Matin">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>

              </tr>
              <tr>
                <th scope="row">Après Midi </th>
                <td>
                  <div class="custom-control custom-checkbox">
                  <div class="checkbox">
                      <label style="font-size: 2.5em">
                          <input name="jours2[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Lundi_Après_Midi">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                  <div class="checkbox">
                      <label style="font-size: 2.5em">
                          <input name="jours2[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Mardi_Après_Midi">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                  <div class="checkbox">
                      <label style="font-size: 2.5em">
                          <input name="jours2[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Mercredi_Après_Midi">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                  <div class="checkbox">
                      <label style="font-size: 2.5em">
                          <input name="jours2[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Jeudi_Après_Midi">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                  <div class="checkbox">
                      <label style="font-size: 2.5em">
                          <input name="jours2[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Vendredi_Après_Midi">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                  <div class="checkbox">
                      <label style="font-size: 2.5em">
                          <input name="jours2[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Samedi_Après_Midi">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <th scope="row">Journée entière</th>
                <td>
                  <div class="custom-control custom-checkbox">
                  <div class="checkbox">
                      <label style="font-size: 2.5em">
                          <input name="jours2[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Lundi_Journée_entière">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                  <div class="checkbox">
                      <label style="font-size: 2.5em">
                          <input name="jours2[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Mardi_Journée_entière">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                  <div class="checkbox">
                      <label style="font-size: 2.5em">
                          <input name="jours2[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Merecredi_Journée_entière">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                  <div class="checkbox">
                      <label style="font-size: 2.5em">
                          <input name="jours2[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Jeudi_Journée_entière">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                  <div class="checkbox">
                      <label style="font-size: 2.5em">
                          <input name="jours2[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Vendredi_Journée_entière">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="custom-control custom-checkbox">
                  <div class="checkbox">
                      <label style="font-size: 1.5em">
                          <input name="jours2[]" id="_1" type="checkbox" class="custom-control-input chekb" value="Samedi_Journée_entière">
                          <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                      </label>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          @error('jours2')
           <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
      </div>
    </div>
    <div class=" mt-2">
      

    <div class="card">
      <div class="card-body">
      <label for="remarques" class="col-4 col-form-label">Remarques :</label>
            <input id="remarques" name="remarques" type="text" class="form-control"><br><br>
            <div class="col text-center">
               <button name="submit" type="submit" Style ="width:200px; height:50px;" class="btn btn-primary">Envoyer</button>
            </div>
      </div>
  
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