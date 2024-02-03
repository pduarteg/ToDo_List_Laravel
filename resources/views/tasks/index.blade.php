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
			<label for="category_id" class="form-label">Categoría de la tarea</label>
			<select name = "category_id" class = "form-select">
				@foreach($saved_categories as $category)
					<option value = " {{ $category->id }} ">{{ $category->name }}</option>
				@endforeach				
			</select>
			<br>
			<button class="btn btn-primary" type="submit">Agregar tarea</button>
		</form>
		<br>
		<div>
			<!-- Nota: saved_tasks se obtiene de la URL mientras que "tarea" se declara en el foreach -->
			@foreach($saved_tasks as $tarea)
				<div class="row py-1">
					<div class = "col-md-9 d-flex align in-items-center" id="task_container">
						<a href="{{ route('edit-todo', ['id' => $tarea->id]) }}">{{ $tarea->title }}</a>
					</div>
					<div class = "col-md-3 d-flex justify-content-end">
						<form action = "{{ route('delete-todo', [$tarea->id]) }}" method="POST">
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