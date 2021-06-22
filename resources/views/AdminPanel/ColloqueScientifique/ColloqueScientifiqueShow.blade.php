@extends('AdminPanel.layout')

@section('main')
<div class="container-fluid ">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
      <div class="card">
        <div class="card-header">
          Valider rattrapage
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <tr>
              <td>{{ $data->user->nom}} {{ $data->user->prenom }}</td>
              <td>:الاسم و .القب</td>
            </tr>
            <tr>
              <td>{{ $data->الصفة }}</td>
              <td>:الصفة</td>
            </tr>
            <tr>
              <td>{{ $data->الأختصاص}}</td>
              <td>:الأختصاص</td>
            </tr>
            <tr>
              <td>{{ $data->الندوة }}</td>
              <td>:الندوة</td>
            </tr>
            <tr>
              <td>{{ $data->من }}</td>

              <td>:من</td>
            </tr>
            <tr>
              <td>{{ $data->إلى }}</td>
              <td>:إلى</td>

            </tr>

            </tbody>

          </table><br><br>

          <div class="col text-center">
            <a href="{{ route('ColloqueScientifiques.pdf',$data->id) }}" Style="width:200px; height:50px;" class="btn btn-primary">Valider</a>
          </div>


        </div>
      </div>
    </div>

  </div>

</div>

@endsection