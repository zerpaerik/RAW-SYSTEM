@extends ('layouts.admin')
@section ('contenido')

<form role="form" action="{{asset('cargos/store')}}" method="POST">
  {{Form::token()}}

 
  <div class="form-group">
    <label for="nombre">Nombre de Cargo</label>
    <input type="text" class="form-control" id="descripcion" name="descripcion"
           placeholder="Introduzca el nombre del Cargo" required autocomplete="off">
  </div>
  
  <button type="submit" class="btn btn-default">Guardar</button>
  <input type="reset" class="btn btn-default" value="Limpiar"> 
</form>

@endsection