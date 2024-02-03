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
		</div>
	</div>
@endsection