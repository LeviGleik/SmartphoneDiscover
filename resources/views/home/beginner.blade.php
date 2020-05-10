@extends('home.home')
@section('beginner')
<div class="card-body">
	<div class="container">
		{{ Form::open(['url' => 'home/beginnerSearch']) }}
		<div class="row">
			<div class="col-md">
				<div class="btn btn-outline-primary">					
					<div class="custom-control custom-checkbox">
				        {{ Form::input('checkbox', 'performance', null, ['id' => 'performance', 'class' => 'custom-control-input']) }}
				        {{ Form::label('performance', 'Performance', ['class' => 'custom-control-label']) }}
					</div>
	            </div>
			</div>
		</div><br />
		<div class="row">
			<div class="col-md">
				<div class="btn btn-outline-primary">					
					<div class="custom-control custom-checkbox">
				        {{ Form::input('checkbox', 'camera', null, ['id' => 'camera', 'class' => 'custom-control-input']) }}
				        {{ Form::label('camera', 'Camera', ['class' => 'custom-control-label']) }}
					</div>
	            </div>
			</div>
		</div><br />
		<div class="row">
			<div class="col-md">
				<div class="btn btn-outline-primary">					
					<div class="custom-control custom-checkbox">
				        {{ Form::input('checkbox', 'battery', null, ['id' => 'battery', 'class' => 'custom-control-input']) }}
				        {{ Form::label('battery', 'Battery', ['class' => 'custom-control-label']) }}
					</div>
	            </div>
			</div>
		</div><br />
		<div class="row">
			<div class="col-md">
				<div class="btn btn-outline-primary">					
					<div class="custom-control custom-checkbox">
				        {{ Form::input('checkbox', 'memory', null, ['id' => 'memory', 'class' => 'custom-control-input']) }}
				        {{ Form::label('memory', 'Memory', ['class' => 'custom-control-label']) }}
					</div>
	            </div>
			</div>
		</div>
	    {{ Form::label('price', 'Price') }}
	    <div class="form-control">
	        {{ Form::input('text', 'price', null, ['data-slider-id' =>'price', 'id' => 'price']) }}
	    </div><br />
		{{ Form::submit('Search', ['class' => 'btn btn-group btn-primary', 'id' => 'submit']) }}
	    {{ csrf_field() }}
		{{ Form::close() }}
	</div>
</div>
@endsection
@section('test')
<script type="text/javascript">
    $(document).ready(function() {
		$("#price").slider({
            min: 500,
            max: 11000,
            tooltip_position: 'bottom',
            formatter: function(value){
                if(value >= 1000){
                    var b = value;
                    var c = 0;
                    while(b >= 1000){
                        b -= 1000;
                        c++;
                    }
                    if(b == 0){
                        return c + ".000 R$";
                    }else{
                        return c + "." + b +" R$";
                    }
                }
                return "R$" + value;
            },
            step: 100,
            range: true
        });
	});
</script>
<style type="text/css">
    .slider.slider-horizontal {
        width: 100%;
    }
    .tooltip.in {
        opacity: 100%;
    }
    #price .slider-selection {
        background: #8ac1ef;
    }
    #price .slider-handle {
        border-bottom-color: blue;
    }
</style>
@endsection