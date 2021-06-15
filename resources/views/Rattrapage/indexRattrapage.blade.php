@extends('layouts.app')

@section('content')
<div class="form-group row">
  <div class="col-md-1"></div>

    <div class="col-md-10">
        <div class="card">
            <div class="card-header">Demande de remplacement de seances d'enseignement</div>
                <div class="card-body">
                    <form action="{{route('rattrapage/enregistrer')}}" method="post">
                        @csrf


                        <label for="select" class="col-2 col-form-label">Matière</label>
                                <select id="select" name="matiere" class="col-4 custom-select">
                                @foreach ($Matieres as $Matiere)
                                    <option value="" disabled selected hidden>Choisir</option>
                                    <option  value="{{ $Matiere['appelation'] }}">{{ $Matiere['appelation'] }}</option>
                                    @endforeach
                                </select><br><br>
                                @error('matiere')
                                 <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            <label for="select" class="col-2 col-form-label">Classe</label>
                                <select id="select" name="classe" class="col-4 custom-select">
                                    <option value="" disabled selected hidden>Choisir</option>
                                    <option  value="classe">classe</option>
                            </select><br><br>
                            @error('classe')
                                 <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <label for="motifRemp" class="col-3 col-form-label">Motif de remplacement</label>
                            <textarea  id="motifRemp" name="motifRemplace" rows="4" cols="50" class="col-4 form-control" placeholder="Motif de remplacement...">
                            </textarea>
                            <br><br>
                            @error('motifRemplace')
                                 <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <h2 align="center">Seance à rattraper</h2>
                            <input type="button" value="Ajouter" onclick="fAddChamps()" /> 
                            
                        <div class="row">
                          <div class="col">
                          <label for="jour" class="col-form-label">Jour</label>
                            <input id="jour" name="jour1" type="date" class="form-control">
                          </div>
                         

                          <div class="col">
                          <label for="select" class="col-form-label">Seance</label>
                                <select id="select" name="seance1" class="custom-select">
                                    <option value="" disabled selected hidden>Choisir</option>
                                    <option  value="Premier seance">Premier seance</option>
                                    <option  value="Deuxième seance">Deuxième seance</option>
                                    <option  value="Troisième seance">Troisième seance</option>
                                    <option  value="Quatrième seance">Quatrième seance</option>
                                    <option  value="cinquième seance">cinquième seance</option>
                            </select>
                          </div>
                        </div>
                        <div id="champs">
                       
                        </div><br><br>
                        
                        @error('jour1')
                                 <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        @error('seance1')
                                 <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <h2 align="center">Nouveau planning</h2>
                        <input type="button" value="Ajouter" onclick="fAddChamps2()" /> 

                        <div class="row">
                          <div class="col">
                          <label for="jour" class="col-form-label">Jour</label>
                            <input id="jour" name="jour2" type="date" class="form-control">
                          </div>
                         

                          <div class="col">
                          <label for="select" class="col-form-label">Seance</label>
                                <select id="select" name="seance2" class="custom-select">
                                    <option value="" disabled selected hidden>Choisir</option>
                                    <option  value="Premier seance">Premier seance</option>
                                    <option  value="Deuxième seance">Deuxième seance</option>
                                    <option  value="Troisième seance">Troisième seance</option>
                                    <option  value="Quatrième seance">Quatrième seance</option>
                                    <option  value="cinquième seance">cinquième seance</option>
                            </select>
                          </div>
            
                          <div class="col">
                            <label for="salle" class="col-form-label">Salle/Labo</label>
                            <input id="salle" name="salle" type="text" class="form-control" placeholder="Salle/Labo">
                          </div>
                        </div>
                        
                        <div id="champs2">
                       
                       </div><br><br>
                        @error('jour2')
                                 <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        @error('seance2')
                                 <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        @error('salle')
                                 <div class="alert alert-danger">{{ $message }}</div>
                        @enderror



                            <div class="col text-center">
                                <button name="submit" type="submit" Style ="width:200px; height:50px;" class="btn btn-primary">Valider</button>
                            </div>
                    </form>
        </div>
    </div>
  </div>
</div>


@endsection

<script type="text/javaScript"> 

      function fAddChamps() {
        var Contenu = document.getElementById('champs').innerHTML;
        Contenu = Contenu + '<div class="row"> <div class="col"><label for="jour" class="col-form-label">Jour</label>'+
        '<input id="jour" name="jour1" type="date" class="form-control"></div>'+'<div class="col">'+
                          '<label for="select" class="col-form-label">Seance</label>'+
                                '<select id="select" name="seance1" class="custom-select">'+
                                    '<option value="" disabled selected hidden>Choisir</option>'+
                                    '<option  value="Premier seance">Premier seance</option>'+
                                    '<option  value="Deuxième seance">Deuxième seance</option>'+
                                    '<option  value="Troisième seance">Troisième seance</option>'+
                                    '<option  value="Quatrième seance">Quatrième seance</option>'+
                                    '<option  value="cinquième seance">cinquième seance</option>'+
                            '</select></div></div>';
        document.getElementById('champs').innerHTML = Contenu;
      }

      function fAddChamps2() {
        var Contenu = document.getElementById('champs2').innerHTML;
        Contenu = Contenu + '<div class="row"> <div class="col"><label for="jour" class="col-form-label">Jour</label>'+
        '<input id="jour" name="jour2" type="date" class="form-control"></div>'+'<div class="col">'+
                          '<label for="select" class="col-form-label">Seance</label>'+
                                '<select id="select" name="seance2" class="custom-select">'+
                                    '<option value="" disabled selected hidden>Choisir</option>'+
                                    '<option  value="Premier seance">Premier seance</option>'+
                                    '<option  value="Deuxième seance">Deuxième seance</option>'+
                                    '<option  value="Troisième seance">Troisième seance</option>'+
                                    '<option  value="Quatrième seance">Quatrième seance</option>'+
                                    '<option  value="cinquième seance">cinquième seance</option>'+
                            '</select></div> '+  
                            '<div class="col">'+
                            '<label for="salle" class="col-form-label">Salle/Labo</label>'+
                            '<input id="salle" name="salle" type="text" class="form-control" placeholder="Salle/Labo">'+
                          '</div></div>';
        document.getElementById('champs2').innerHTML = Contenu;
      }
</script> 