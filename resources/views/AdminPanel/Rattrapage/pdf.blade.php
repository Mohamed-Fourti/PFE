<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  </head>
  <body>
  <div>République Tunisienne <br>Ministère de l'Enseignement Supérieur <br>
    et de la Recherche Scientifique <br>Direction Générale des Etudes Technologiques <br>
    Institut Supérieur des Etudes Technologiques de Djerba <br>
    Département Technologies de l'Informatique
  </div>
  <div><img src="{{ asset('images/logo.png') }}" alt="Logo"></div>
  <div>الجمهورية التونسية <br> وزارة التعليم العالي
     و البحث العلمي <br> الادارة العامة للدراسات التكنولوجية<br>
     <br> المعهد العالي للدراسات التكنولوجية بجربة
     قسم تكنولوجيا الاعلامية</div>

     <div>Date:</div>
     <h4>AVIS AUX ETUDIANTS DE LA CLASSE</h4>
     <div>{{ $data->classe }}</div>
     <div><h2>REMPLACEMENT DE SEANCE D'ENSEIGNEMENT</h2></div>

     <div>Les étudiant de la classe {{ $data->classe }} sont informés que l'enseignement de la matière {{ $data->matiere }}
        assurée par l'enseignant {{ $data->user->nom}} et prévue pendant la (les) séance(s) suivante(s):
     </div>
     <table>
     <tr>
     <td>Jour</td><td>{{ $data->jour1 }}</td><td>Séance</td><td>{{ $data->seance1 }}</td>
     </tr>
     </table>


     <div>Aura lieu selon le planning suivant:</div>
     <table border=1>
     <thead>
        <tr>
        <th>Jour et date</th>
        <th>Séance</th>
        <th>Salle/Labo</th>
        </tr>
     </thead>

    <tbody>
        <tr>
        <td>{{ $data->jour2 }}</td>
        <td>{{ $data->seance2 }}</td>
        <td>{{ $data->salle }}</td>
        </tr>
    </tbody>
     </table>

     <div>Le Directeur du Département</div>


  </body>
</html>