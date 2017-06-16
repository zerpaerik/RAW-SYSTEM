@extends ('layouts.admin')

@section ('title','Lista de Organismos')
@section ('contenido')


<table class="table">
<thead>
	<th>Id</th>
	<th>Descripción</th>
</thead>
<tbody>
@foreach($data as $organismo)
     <tr>
     	<td>{{$organismo->id}}</td>
     	<td>{{$organismo->descripcion}}</td>
     	<td><a class="btn btn-success" href="{{asset('organismos/edit')}}/{{$organismo->id}}">Actualizar</a></td>

     	<td><a href="" data-target="#modal-delete-{{$organismo->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a></td>
     </tr>
     @include('organismos.organismo-modal')
@endforeach

</tbody>
</table>

{{ $data->links() }}

@endsection