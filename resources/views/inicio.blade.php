@extends ('plantilla')


@section('content')
  <div class="row">
    	<div class="col-md-7">
    		
			<table class="table">
				{{-- Columnas --}}
				<tr>
		    		<th>ID</th>
		    		<th>Nombre</th>
		    		<th>Descripción</th>
		    		<th>Acciones</th>
				</tr>

				@foreach($notas as $item)
					<tr>
						<td>{{ $item->id }}</td>
						<td>{{ $item->nombre }}</td>
						<td>{{ $item->descripcion }}</td>
						{{-- mandamos el $item->id como variable de referencia por la ruta editar --}}
						<td>
							{{-- boton guardar --}}
							<a href="{{ route('editar',$item->id) }}" class="btn btn-warning">Editar</a>  {{-- warning es el color amarillo del botón --}}
							{{-- boton eliminar --}}
							<form action="{{ route('eliminar',$item->id) }}" method="POST" class="d-inline">{{-- d-inline para que no se pase de la linea  --}}
								@method('DELETE')		
								@csrf  	
								<button type="submit" class="btn btn-danger">Eliminar</button> {{-- danger es el color rojo del botón --}}
							</form>	
						</td>
					</tr>
				@endforeach

    		</table>
				@if (session('eliminar'))
					<div class="alert alert-success mt-3">
					{{session('eliminar') }}
					</div>
				@endif

			

			{{ $notas->links() }}  	 {{-- para que pagination(5) que esta en index, funcione. --}}


    	</div>
    	{{-- fila formulario --}}
			<div class="col-md-5">
				<h3 class="text-center mb-4">Agregar Notas</h3>

				<form action="{{ route('store') }}">
					@csrf
			
					<div class="form-group">
						<input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre de la nota" required>
					</div>
					{{-- para la validacion de nombre se usa @error--}}
					@error('nombre')
						<div class="alert-danger">
							El nombre es requerido
						</div>
					@enderror
						
					<div class="form-group">
						<input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripcion" required>
					</div>
					{{-- para la validacion de descripcio se usa @error--}}
					@error('nombre')
						<div class="alert-danger">
							El descripcion es requerido
						</div>
					@enderror

					<button  type="submit" class="btn btn-success btn-block"> Enviar nota </button>
				</form>

				@if(session('agregar'))
				<div class="alert alert-success mt-3">
					{{session('agregar') }}
				</div>
				@endif
		{{-- Fin de la fila formulario --}}	
   		 </div> 
  	</div>
@endsection