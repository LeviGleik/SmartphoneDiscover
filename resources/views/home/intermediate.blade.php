@extends('home.home')
@section('intermediate')
<div class="card-body">
	<div class="alert alert-danger" style="display: none">
        You can't select more than 3 itens
    </div>
	{{ Form::open(['url' => 'home/intermediateSearch']) }}
	<div class="row">
		<div class="col-md-3">
			{{ Form::label('performance', 'Performance (AnTuTu)') }}
            <div class="form-control">
                {{ Form::input('text', 'performance', 1, ['data-slider-id' =>'performance', 'id' => 'performance']) }}
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			{{ Form::label('camera', 'Camera') }}
            <div class="form-control">
                {{ Form::input('text', 'camera', 1, ['data-slider-id' =>'camera', 'id' => 'camera']) }}
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			{{ Form::label('battery', 'Battery') }}
            <div class="form-control">
                {{ Form::input('text', 'battery', 1, ['data-slider-id' =>'battery', 'id' => 'battery']) }}
            </div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			{{ Form::label('memory', 'Memory') }}
            <div class="form-control">
                {{ Form::input('text', 'memory', 1, ['data-slider-id' =>'memory', 'id' => 'memory']) }}
            </div>
		</div>
	</div> <br />
	{{ Form::submit('Search', ['class' => 'btn btn-group btn-primary', 'id' => 'submit']) }}
	{{ Form::close() }}
</div>
<script type="text/javascript">
	$("#performance").slider({
        min: 1,
        max: 5,
        value: 3,
        tooltip_position: 'bottom',
        formatter: function(value){
            switch(value){
                case 1:
                    return "0 - 70000";
                case 2:
                    return "70000 - 120000";
                case 3:
                    return "100000 - 250000";
                case 4:
                    return "150000 - 350000";
                case 5:
                    return "350000 - 1000000";
            }
        },
        step: 1
    });
	$("#camera").slider({
        min: 1,
        max: 5,
        value: 3,
        tooltip_position: 'bottom',
        formatter: function(value){
            switch(value){
                case 1:
                    return "5MP - 8MP";
                case 2:
                    return "8MP - 10MP";
                case 3:
                    return "8MP - 12MP";
                case 4:
                    return "12MP - 16MP";
                case 5:
                    return "16MP - 108MP";
            }
        },
        step: 1
    });
	$("#battery").slider({
        min: 1,
        max: 5,
        value: 3,
        tooltip_position: 'bottom',
        formatter: function(value){
            switch(value){
                case 1:
                    return "0mAh - 1200mAh";
                case 2:
                    return "0mAh - 2000mAh";
                case 3:
                    return "2000mAh - 4000mAh";
                case 4:
                    return "3200mAh - 4500mAh";
                case 5:
                    return "4000mAh - 6000mAh";
            }
        },
        step: 1
    });
	$("#memory").slider({
        min: 1,
        max: 5,
        value: 3,
        tooltip_position: 'bottom',
        formatter: function(value){
            switch(value){
                case 1:
                    return "0GB - 2GB";
                case 2:
                    return "0GB - 16GB";
                case 3:
                    return "16GB - 64GB";
                case 4:
                    return "32GB - 128GB";
                case 5:
                    return "64GB - 512GB";
            }
        },
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
</style>
@endsection
