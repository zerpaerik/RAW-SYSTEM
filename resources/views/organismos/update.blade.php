@extends ('layouts.admin')
@section ('contenido')

<form role="form" action="{{asset('organismos/update')}}/{{$data->id}}" method="PUT">
  {{Form::token()}}

  <div class="form-group">
    <label for="descripcion">Nombre del Organismo</label>
    <input type="text" class="form-control" id="descripcion" name="descripcion"
           placeholder="Introduce tu nombre" required="" value="{{$data->descripcion}}" required autocomplete="off">
  </div>
  <button type="submit" class="btn btn-default">Actualizar</button>
</form>

@endsection