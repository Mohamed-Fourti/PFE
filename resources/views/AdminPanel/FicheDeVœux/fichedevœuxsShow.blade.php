@extends('AdminPanel.layout')

@section('main')
<div class="container-fluid ">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
      <div class="card">
        <div class="card-header">
          Fiche de Fiche De Vœux {{ $data->FichedevœuxOF->sem}}
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <tr>
              <td>Enseignants :</td>
              <td>{{ $data->user->nom}}</td>
            </tr>
            <tr>
              <td>Email :</td>
              <td>{{ $data->user->email }}</td>
            </tr>
            <tr>
              <td>charge:</td>
              @if($data->chargeS1)
              <td>{{ $data->chargeS1 }}</td>
              @else
              <td>{{ $data->chargeS2 }}</td>
              @endif
            </tr>
            <tr>
              <td>Remarques:</td>
              <td>{{ $data->remarques}}</td>
            </tr>
            <tr>
              <td>Matieres :</td>
              <td>
                @foreach ($data->Matieres as $Matiere)
                <div>- {{ $Matiere['Matiere'] }}</div>
                @endforeach
              </td>
            </tr>
            <tr>
              <td>Jours de travail (Combinaison 1 )</td>
              <td>
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
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Lundi_Matin',$data->jours1)  ? 'checked' : '' }} value="Lundi_Matin">
                              <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                            </label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <div class="checkbox">
                            <label style="font-size: 2.5em">
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Mardi_Matin',$data->jours1)  ? 'checked' : '' }} value="Mardi_Matin">
                              <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                            </label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <div class="checkbox">
                            <label style="font-size: 2.5em">
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Mercredi_Matin',$data->jours1)  ? 'checked' : '' }} value="Mercredi_Matin">
                              <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                            </label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <div class="checkbox">
                            <label style="font-size: 2.5em">
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Jeudi_Matin',$data->jours1)  ? 'checked' : '' }} value="Jeudi_Matin">
                              <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                            </label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <div class="checkbox">
                            <label style="font-size: 2.5em">
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Vendredi_Matin',$data->jours1)  ? 'checked' : '' }} value="Vendredi_Matin">
                              <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                            </label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <div class="checkbox">
                            <label style="font-size: 2.5em">
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Samedi_Matin',$data->jours1)  ? 'checked' : '' }} value="Samedi_Matin">
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
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Lundi_Après_Midi',$data->jours1)  ? 'checked' : '' }} value="Lundi_Après_Midi">
                              <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                            </label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <div class="checkbox">
                            <label style="font-size: 2.5em">
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Mardi_Après_Midi',$data->jours1)  ? 'checked' : '' }} value="Mardi_Après_Midi">
                              <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                            </label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <div class="checkbox">
                            <label style="font-size: 2.5em">
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Mercredi_Après_Midi',$data->jours1)  ? 'checked' : '' }} value="Mercredi_Après_Midi">
                              <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                            </label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <div class="checkbox">
                            <label style="font-size: 2.5em">
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Jeudi_Après_Midi',$data->jours1)  ? 'checked' : '' }} value="Jeudi_Après_Midi">
                              <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                            </label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <div class="checkbox">
                            <label style="font-size: 2.5em">
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Vendredi_Après_Midi',$data->jours1)  ? 'checked' : '' }} value="Vendredi_Après_Midi">
                              <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                            </label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <div class="checkbox">
                            <label style="font-size: 2.5em">
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Samedi_Après_Midi',$data->jours1)  ? 'checked' : '' }} value="Samedi_Après_Midi">
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
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Lundi_Journée_entière',$data->jours1)  ? 'checked' : '' }} value="Lundi_Journée_entière">
                              <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                            </label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <div class="checkbox">
                            <label style="font-size: 2.5em">
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Mardi_Journée_entière',$data->jours1)  ? 'checked' : '' }} value="Mardi_Journée_entière">
                              <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                            </label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <div class="checkbox">
                            <label style="font-size: 2.5em">
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Merecredi_Journée_entière',$data->jours1)  ? 'checked' : '' }} value="Merecredi_Journée_entière">
                              <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                            </label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <div class="checkbox">
                            <label style="font-size: 2.5em">
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Jeudi_Journée_entière',$data->jours1)  ? 'checked' : '' }} value="Jeudi_Journée_entière">
                              <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                            </label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <div class="checkbox">
                            <label style="font-size: 2.5em">
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Vendredi_Journée_entière',$data->jours1)  ? 'checked' : '' }} value="Vendredi_Journée_entière">
                              <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                            </label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <div class="checkbox">
                            <label style="font-size: 2.5em">
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Samedi_Journée_entière',$data->jours1)  ? 'checked' : '' }} value="Samedi_Journée_entière">
                              <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                            </label>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            <tr>
              <td>Jours de travail (Combinaison 2 )</td>
              <td>
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
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Lundi_Matin',$data->jours2)  ? 'checked' : '' }} value="Lundi_Matin">
                              <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                            </label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <div class="checkbox">
                            <label style="font-size: 2.5em">
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Mardi_Matin',$data->jours2)  ? 'checked' : '' }} value="Mardi_Matin">
                              <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                            </label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <div class="checkbox">
                            <label style="font-size: 2.5em">
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Mercredi_Matin',$data->jours2)  ? 'checked' : '' }} value="Mercredi_Matin">
                              <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                            </label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <div class="checkbox">
                            <label style="font-size: 2.5em">
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Jeudi_Matin',$data->jours2)  ? 'checked' : '' }} value="Jeudi_Matin">
                              <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                            </label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <div class="checkbox">
                            <label style="font-size: 2.5em">
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Vendredi_Matin',$data->jours2)  ? 'checked' : '' }} value="Vendredi_Matin">
                              <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                            </label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <div class="checkbox">
                            <label style="font-size: 2.5em">
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Samedi_Matin',$data->jours2)  ? 'checked' : '' }} value="Samedi_Matin">
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
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Lundi_Après_Midi',$data->jours2)  ? 'checked' : '' }} value="Lundi_Après_Midi">
                              <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                            </label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <div class="checkbox">
                            <label style="font-size: 2.5em">
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Mardi_Après_Midi',$data->jours2)  ? 'checked' : '' }} value="Mardi_Après_Midi">
                              <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                            </label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <div class="checkbox">
                            <label style="font-size: 2.5em">
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Mercredi_Après_Midi',$data->jours2)  ? 'checked' : '' }} value="Mercredi_Après_Midi">
                              <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                            </label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <div class="checkbox">
                            <label style="font-size: 2.5em">
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Jeudi_Après_Midi',$data->jours2)  ? 'checked' : '' }} value="Jeudi_Après_Midi">
                              <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                            </label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <div class="checkbox">
                            <label style="font-size: 2.5em">
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Vendredi_Après_Midi',$data->jours2)  ? 'checked' : '' }} value="Vendredi_Après_Midi">
                              <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                            </label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <div class="checkbox">
                            <label style="font-size: 2.5em">
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Samedi_Après_Midi',$data->jours2)  ? 'checked' : '' }} value="Samedi_Après_Midi">
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
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Lundi_Journée_entière',$data->jours2)  ? 'checked' : '' }} value="Lundi_Journée_entière">
                              <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                            </label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <div class="checkbox">
                            <label style="font-size: 2.5em">
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Mardi_Journée_entière',$data->jours2)  ? 'checked' : '' }} value="Mardi_Journée_entière">
                              <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                            </label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <div class="checkbox">
                            <label style="font-size: 2.5em">
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Merecredi_Journée_entière',$data->jours2)  ? 'checked' : '' }} value="Merecredi_Journée_entière">
                              <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                            </label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <div class="checkbox">
                            <label style="font-size: 2.5em">
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Jeudi_Journée_entière',$data->jours2)  ? 'checked' : '' }} value="Jeudi_Journée_entière">
                              <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                            </label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <div class="checkbox">
                            <label style="font-size: 2.5em">
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Vendredi_Journée_entière',$data->jours2)  ? 'checked' : '' }} value="Vendredi_Journée_entière">
                              <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                            </label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <div class="checkbox">
                            <label style="font-size: 2.5em">
                              <input name="" id="_1" disabled type="checkbox" class="custom-control-input chekb" {{ in_array('Samedi_Journée_entière',$data->jours2)  ? 'checked' : '' }} value="Samedi_Journée_entière">
                              <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
                            </label>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            </tbody>

          </table>


        </div>
      </div>
    </div>

  </div>

</div>

@endsection