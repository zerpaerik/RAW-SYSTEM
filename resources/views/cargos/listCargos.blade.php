@extends ('layouts.admin')

@section ('title','Lista de Cargos')
@section ('contenido')


<table class="table">
<thead>
	<th>Id</th>
	<th>Descripción</th>
</thead>
<tbody>
@foreach($data as $cargo)
     <tr>
     	<td>{{$cargo->id}}</td>
     	<td>{{$cargo->descripcion}}</td>
     	<td><a class="btn btn-success" href="{{asset('cargos/edit')}}/{{$cargo->id}}">Actualizar</a></td>

     	<td><a href="" data-target="#modal-delete-{{$cargo->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a></td>
     </tr>
     @include('cargos.cargo-modal')
@endforeach

</tbody>
</table>

{{ $data->links() }}

@endsection