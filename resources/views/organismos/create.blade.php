           
    <div class="row">
	    <div class="col-md-8 col-sm-12 col-xs-12">
    		<div class="card">
    			<div class="card-action">
        			<b>Crear Organismos</b>
    			</div>
    			<div class="card-content">
    			<!-- Aqui es donde va el form-->
				<form role="form" action="{{asset('organismos/store')}}" method="POST">
  					{{Form::token()}}
					<div class="form-group">
    					<label for="nombre">Nombre de Organismo</label>
    					<input type="text" class="form-control" id="descripcion" name="descripcion"
           				placeholder="Introduzca el nombre del Organismo y/o Ente" required autocomplete="off">
  					</div>
  				    <button type="submit" class="btn btn-success">Guardar</button>
  					<input type="reset" class="btn btn-info" value="Limpiar"> 
				</form>
    			<!-- Aqui es donde va el form-->
				</div>    		
    		</div>          
    	</div>
    </div>
