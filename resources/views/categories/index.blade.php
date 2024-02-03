@extends('app')

@section('content')
	<div class="container w-25 border p-4 my-4">
		<div class="row mx-auto">
			<form action="{{ route('categories.store') }}", method="POST">
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
				  <input type="text" class="form-control" name="categoryName" placeholder="Escribe aquí la nueva categoría">
				</div>
				<div class="mb-3">
				  <label for="color" class="form-label">Color de la categoría</label>
				  <input type="color" class="form-control" name="categoryColor" placeholder="Escribe aquí la nueva tarea">
				</div>
				<button class="btn btn-primary" type="submit">Crear categoría</button>
			</form>			
		</div>
		<br>
		<div>
			@foreach($sent_categories as $i_category)
				<div class="row py-1">
					<div class = "col-md-9 d-flex align-items-center">
						<a class = "d-flex align-items-center gap-2" href="{{ route('categories.show', ['category' => $i_category->id]) }}">
							<span class ="color-container" style="background-color: {{ $i_category->color }};"></span>
							{{ $i_category->name }}
						</a>
					</div>
					<div class = "col-md-3 d-flex justify-content-end">
						<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-{{ $i_category->id }}">Eliminar</button>
					</div>
				</div>

				<!-- Modal -->
				<div class="modal fade" id="modal-{{ $i_category->id  }}" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
				        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				      </div>
				      <div class="modal-body">
				      	Al eliminar la una categoría se eliminan todas las tareas asignadas a la misma.
				        ¿Está seguro de eliminar la cateogría <strong>{{ $i_category->name }}</strong>?
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				        <form action =" {{ route('categories.destroy' , ['category' => $i_category->id]) }} " method="POST">
				        	@method('DELETE')
				        	@csrf
				        	<button type="button" class="btn btn-danger">Delete</button>	
				        </form>
				      </div>
				    </div>
				  </div>
				</div>
			@endforeach
		</div>
	</div>
@endsection