<!-- Ya no es necesario escribir toda la estructura html
sino que se referencia a la plantilla y se coloca el contenido
especificado para la directiva content 

Nota: no se usarán QUERRYS sino MIGRACIONES.
Nota: ORM: Object Relational Mapper
Se tendrá una relación entre las tablas con los modelos.

Los modelos se encuentran en app/Models
Las migraciones hacen las consultas de la base de datos.
-->

@extends('app')

@section('content')
	<div class ="container w-25 border p-4 mt-4 	">
		<form action="/", method="POST">
			@csrf
			<!-- configurando que se haya realizado exitosamente la acción -->
			@if(session('succes'))
				<h6 class="alert alert-succes">{{ session('succes')}}</h6>
			@endif

			@error('taskTitle')
				<h6 class="alert alert-danger">{{ $message }}</h6>
			@enderror

			<div class="mb-3">
			  <label for="exampleFormControlInput1" class="form-label">Título de la tarea</label>
			  <input type="text" class="form-control" name="taskTitle" placeholder="Escribe aquí la nueva tarea">
			</div>
			<button class="btn btn-primary" type="submit">Agregar tarea</button>
		</form>

		<div>
			<!-- Nota: saved_tasks se obtiene de la URL mientras que "tarea" se declara en el foreach -->
			@foreach($saved_tasks as $tarea)
				<div class="row py-1">
					<div class = "col-md-9 d-flex align in-items-center">
						<a href="{{ route('todos-edit', ['id' => $tarea->id]) }}">{{ $tarea->title }}</a>
					</div>
					<div class = "col-md-3 d-flex justify-content-end">
						<form action = "{{ route('delete-todos', [$tarea->id]) }}" method="POST">
							@method('DELETE')
							@csrf
							<button class = "btn btn-danger btn-sm">Eliminar</button>
						</form>
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endsection