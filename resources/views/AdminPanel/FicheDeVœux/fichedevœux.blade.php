@extends('AdminPanel.layout')

@section('main')

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
      <div class="card">
        <div class="card-header">
          Publication
        </div>
        <div class="card-body">

            <table class="table  table-sm">

              @foreach($datas as $data)

              <tbody>
                <tr class="{{ $data->active==1 ? 'table-success' : 'table-danger' }}">
                  <td> {{ $data->sem }}
                  </td>
                  <td>                 <input name="id" type="text" hidden value="{{$data->id}}">

                  </td>
                  <td>
                    <div class="form-group row">
                      <div class="col-8">
                      <a href="{{ route('Ouverture',$data->id) }}">
                      <button type="button" >Ouverture</button></a>
                      <a href="{{ route('Fermeture',$data->id)}}">
                      <button type="button" >Fermeture</button></a>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>


              @endforeach
            </table>

        </div>

      </div>

    </div>

  </div>
</div>
@endsection