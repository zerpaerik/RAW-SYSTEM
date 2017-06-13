@extends ('layouts.admin')

@section ('title','Lista de Locaciones')
@section ('contenido')


<table class="table">
<thead>
	<th>Id</th>
	<th>Name</th>
	<th>Latitude</th>
	<th>Lengh</th>
</thead>
<tbody>
@foreach($data as $location)
     <tr>
     	<td>{{$user->id}}</td>
     	<td>{{$user->nombre}}</td>
     	<td>{{$user->latitud}}</td>
     	<td>{{$user->longitud}}</td>
     	<td><a class="btn btn-success" href="{{asset('location/edit')}}/{{$location->id}}">Update</a></td>

     	<td><a href="" data-target="#modal-delete-{{$location->id}}" data-toggle="modal"><button class="btn btn-danger">Delete</button></a></td>
     </tr>
     @include('location.location-modal')
@endforeach

</tbody>
</table>

{{ $data->links() }}

@endsection