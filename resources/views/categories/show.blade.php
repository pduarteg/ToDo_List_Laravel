@extends('app')

@section('content')
	<div class="container w-25 border p-4 my-4">
		<div class="row mx-auto">
			<form action="{{ route('categories.update', ['category' => $sent_category->id]) }}", method="POST">
				@method('PATCH')
				@csrf
				<!-- configurando que se haya realizado exitosamente la acción -->
				@if(session('succes'))
					<h6 class="alert alert-succes">{{ session('succes')}}</h6>
				@endif

				@error('categoryName')
					<h6 class="alert alert-danger">{{ $message }}</h6>
				@enderror

				<div class="mb-3">
				  <label for="exampleFormControlInput1" class="form-label">Nombre de la categoría</label>
				  <input type="text" class="form-control" name="categoryName" placeholder="Escribe aquí la nueva categoría" value="{{ $sent_category->name }}">
				</div>
				<div class="mb-3">
				  <label for="color" class="form-label">Color de la categoría</label>
				  <input type="color" class="form-control" name="categoryColor" value="{{ $sent_category->color }}">
				</div>
				<button class="btn btn-primary" type="submit">Actualizar categoría</button>
			</form>

			<br>

			<div>
				<!-- tasks se refiere al método para Category creado en el modelo Category -->
				<br>
				@if($sent_category->tasks->count() > 0)
					@foreach($sent_category->tasks as $task)
						<div class = "row py-1">
							<div class = "col-md-9 d-flex align-items-center">
								<a href="{{ route('edit-todo', ['id' => $task->id]) }}">{{ $task->title }}</a>
							</div>
								<div class = "col-md-3 d-flex justify-content-end">
								<form action = "{{ route('delete-todo', [$task->id])}}" method="POST">
									@method('DELETE')
									@csrf
									<button class="btn btn-danger btn-sm">Eliminar</button>
								</form>
							</div>
						</div>
					@endforeach
				@else

					No hay tareas para esta categoría.

				@endif
			</div>
		</div>
	</div>
@endsection