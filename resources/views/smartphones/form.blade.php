@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
					Cadastro
                </div>
                <div class="card-body">
                    {{ Form::open() }}
                    {{ Form::label('brand', 'Brand Name') }}
                    {{ Form::input('text', 'brand', old('brand'), ['class' => 'form-control', 'id' => 'brand']) }}

                    {{ Form::label('name', 'Device Name') }}
                    {{ Form::input('text', 'name', old('name'), ['class' => 'form-control', 'id' => 'name']) }}

                    {{ Form::label('year', 'Launch Year') }}
                    <div class="form-control">
                        {{ Form::input('text', 'year', old('year'), ['id' => 'year']) }}
                    </div>

                    {{ Form::label('chipset', 'Chipset') }}
                    {{ Form::select('chipset', ['L' => 'TesteL', 'S' => 'TesteS'], null, ['class' => 'form-control', 'id' => 'chipset']) }}

                    {{ Form::label('mem_ram', 'Ram Memory') }}
                    <div class="form-control">
                        {{ Form::input('text','mem_ram', old('mem_ram'), ['id' => 'mem_ram']) }}
                    </div>
                    {{ Form::label('mem_int', 'Internal Memory') }}
                    <div class="form-control">
                        {{ Form::input('text','mem_int', old('mem_int'), ['id' => 'mem_int']) }}
                    </div>
                    <br />
                    {{ Form::submit('Salvar', ['class' => 'btn btn-group btn-primary', 'id' => 'submit']) }}

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('test')
<script type="text/javascript">
    $(document).ready(function() {
        $("#year").slider({
            ticks: [2015, 2016, 2017, 2018, 2019, 2020],
            tooltip_position: 'bottom',
            formatter: function(value) {
                return value;
            },
            lock_to_ticks: true
        }); 
        $("#mem_ram").slider({
            ticks: [0, 1, 2, 3, 4, 6, 8, 10, 12, 16],
            tooltip_position: 'bottom',
            formatter: function(value) {
                if(value != 0){
                   return value + ' GB';
                }else{
                    return '512 MB';
                }
            },
            lock_to_ticks: true
        }); 
        $("#mem_int").slider({
            ticks: [0, 1, 2, 4, 8, 16, 32, 64, 128, 256, 512],
            ticks_positions: [0, 9.09, 18.18, 27.27, 36.36, 45.45, 54.54, 63.63, 72.72, 81.81, 100],
            tooltip_position: 'bottom',
            formatter: function(value) {
                if(value != 0){
                   return value + ' GB';
                }else{
                    return '512 MB';
                }
            },
            lock_to_ticks: true
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
</style>
@endsection