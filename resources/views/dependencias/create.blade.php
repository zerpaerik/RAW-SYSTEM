@extends ('layouts.admin')
@section ('contenido')

<form role="form" action="{{asset('organismos/store')}}" method="POST">
  {{Form::token()}}

 


        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="dep" style="display:none">
			<label for="nombre">Nombre de Organismo</label>
			<select name="id" class="form-control">
				<option	value="00">Seleccione</option>
				@foreach ($organismo as $org)
					<option	value="{{$dep->lng_iddependencia}}">{{$org->descripcion}}</option>
				@endforeach
			</select>

		</div>

  <div class="form-group">
    <label for="nombre">Nombre de Dependendia</label>
    <input type="text" class="form-control" id="descripcion" name="descripcion"
           placeholder="Introduzca el nombre del Organismo y/o Ente" required autocomplete="off">
  </div>
  
  <button type="submit" class="btn btn-default">Guardar</button>
  <input type="reset" class="btn btn-default" value="Limpiar"> 
</form>

@endsection