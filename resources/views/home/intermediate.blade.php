@extends('home.home')
@section('intermediate')
<div class="card-body">
	<div class="alert alert-danger" style="display: none">
        You can't select more than 3 itens
    </div>
	{{ Form::open(['url' => 'home/intermediateSave']) }}
	<div class="row">
		<div class="col-md-3">
			{{ Form::label('performance', 'Performance') }}
            <div class="form-control">
                {{ Form::input('text', 'performance', null, ['data-slider-id' =>'performance', 'id' => 'performance']) }}
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			{{ Form::label('camera', 'Camera') }}
            <div class="form-control">
                {{ Form::input('text', 'camera', null, ['data-slider-id' =>'camera', 'id' => 'camera']) }}
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			{{ Form::label('battery', 'Battery') }}
            <div class="form-control">
                {{ Form::input('text', 'battery', null, ['data-slider-id' =>'battery', 'id' => 'battery']) }}
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			{{ Form::label('memory', 'Memory') }}
            <div class="form-control">
                {{ Form::input('text', 'memory', null, ['data-slider-id' =>'memory', 'id' => 'memory']) }}
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			{{ Form::label('price', 'Price') }}
            <div class="form-control">
                {{ Form::input('text', 'price', null, ['data-slider-id' =>'price', 'id' => 'price']) }}
            </div>
		</div>
	</div><br />
	{{ Form::submit('Search', ['class' => 'btn btn-group btn-primary', 'id' => 'submit']) }}
	{{ Form::close() }}
</div>
<script type="text/javascript">
	$("#performance").slider({
        min: 1,
        max: 5,
        tooltip_position: 'bottom',
        step: 1
    });
	$("#camera").slider({
        min: 1,
        max: 5,
        tooltip_position: 'bottom',
        step: 1
    });
	$("#battery").slider({
        min: 1,
        max: 5,
        tooltip_position: 'bottom',
        step: 1
    });
	$("#memory").slider({
        min: 1,
        max: 5,
        tooltip_position: 'bottom',
        step: 1
    });
	$("#price").slider({
        min: 1,
        max: 5,
        tooltip_position: 'bottom',
        step: 1
    });
</script>

<style type="text/css">
	.slider.slider-horizontal {
        width: 100%;
    }
    .tooltip.in {
        opacity: 100%;
    }
    #performance .slider-selection {
        background: #8ac1ef;
    }
    #performance .slider-handle {
        border-bottom-color: blue;
    }
    #battery .slider-selection {
        background: #8ac1ef;
    }
    #battery .slider-handle {
        border-bottom-color: blue;
    }
    #camera .slider-selection {
        background: #8ac1ef;
    }
    #camera .slider-handle {
        border-bottom-color: blue;
    }
    #memory .slider-selection {
        background: #8ac1ef;
    }
    #memory .slider-handle {
        border-bottom-color: blue;
    }
    #price .slider-selection {
        background: #8ac1ef;
    }
    #price .slider-handle {
        border-bottom-color: blue;
    }
</style>
@endsection
