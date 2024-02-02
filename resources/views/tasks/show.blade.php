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
		<!-- Nota: se usa el nombre "$to_show_task" porque así se mandó en el controlador. -->
		<form action="{{ route('update-todo', ['id' => $to_show_task->id]) }}", method="POST">
			@method('PATCH')
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
			  <input type="text" class="form-control" name="taskTitle" placeholder="Edita la tarea" value="{{ $to_show_task->title }}">
			</div>
			<button class="btn btn-primary" type="submit">Actualizar tarea</button>
		</form>
	</div>
@endsection