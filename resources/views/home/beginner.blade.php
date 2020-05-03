@extends('home.home')
@section('beginner')
<div class="card-body">
    <div class="alert alert-danger" style="display: none">
        You can't select more than 3 itens
    </div>
	{{ Form::open(['url' => 'home/beginnerSearch']) }}
	<div class="row">
		<div class="col-md">
			<div class="btn btn-outline-primary">					
				<div class="custom-control custom-checkbox">
			        {{ Form::input('checkbox', 'checkboxes[]', null, ['id' => 'price', 'class' => 'custom-control-input']) }}
			        {{ Form::label('price', 'Price', ['class' => 'custom-control-label']) }}
				</div>
            </div>
		</div>
	</div><br />
	<div class="row">
		<div class="col-md">
			<div class="btn btn-outline-primary">					
				<div class="custom-control custom-checkbox">
			        {{ Form::input('checkbox', 'checkboxes[]', null, ['id' => 'performance', 'class' => 'custom-control-input']) }}
			        {{ Form::label('performance', 'Performance', ['class' => 'custom-control-label']) }}
				</div>
            </div>
		</div>
	</div><br />
	<div class="row">
		<div class="col-md">
			<div class="btn btn-outline-primary">					
				<div class="custom-control custom-checkbox">
			        {{ Form::input('checkbox', 'checkboxes[]', null, ['id' => 'camera', 'class' => 'custom-control-input']) }}
			        {{ Form::label('camera', 'Camera', ['class' => 'custom-control-label']) }}
				</div>
            </div>
		</div>
	</div><br />
	<div class="row">
		<div class="col-md">
			<div class="btn btn-outline-primary">					
				<div class="custom-control custom-checkbox">
			        {{ Form::input('checkbox', 'checkboxes[]', null, ['id' => 'battery', 'class' => 'custom-control-input']) }}
			        {{ Form::label('battery', 'Battery', ['class' => 'custom-control-label']) }}
				</div>
            </div>
		</div>
	</div><br />
	<div class="row">
		<div class="col-md">
			<div class="btn btn-outline-primary">					
				<div class="custom-control custom-checkbox">
			        {{ Form::input('checkbox', 'checkboxes[]', null, ['id' => 'memory', 'class' => 'custom-control-input']) }}
			        {{ Form::label('memory', 'Memory', ['class' => 'custom-control-label']) }}
				</div>
            </div>
		</div>
	</div><br />
	{{ Form::submit('Search', ['class' => 'btn btn-group btn-primary', 'id' => 'submit']) }}
	{{ Form::close() }}
</div>
@endsection