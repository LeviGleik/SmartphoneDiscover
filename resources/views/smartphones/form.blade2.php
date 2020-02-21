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
                    <br />

                    {{ Form::label('chipset', 'Chipset') }}
                    {{ Form::select('chipset', ['L' => 'TesteL', 'S' => 'TesteS'], null, ['class' => 'form-control', 'id' => 'chipset']) }}

                    {{ Form::label('mem_ram', 'Ram Memory') }}
                    <div class="form-control">
                        {{ Form::input('text','mem_ram', old('mem_ram'), ['id' => 'mem_ram']) }}
                    </div>
                    <br />

                    {{ Form::label('mem_int', 'Internal Memory') }}
                    <div class="form-control">
                        {{ Form::input('text','mem_int', old('mem_int'), ['id' => 'mem_int']) }}
                    </div>
                    <br />

                    <div class="custom-control custom-checkbox">
                        {{ Form::input('checkbox','mem_exp_boolean', old('mem_exp_boolean'), ['class' => 'custom-control-input','id' => 'mem_exp_boolean']) }}

                        {{ Form::label('mem_exp_boolean', 'External Memory', ['class' => 'custom-control-label']) }}
                    </div>
                    <br />

                    {{ Form::label('display', 'Display Size') }}
                    <div class="form-control">
                        {{ Form::input('text', 'display', old('display'), ['id' => 'display']) }}
                    </div>
                    <br />

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
            value: [2015, 2020],
            ticks_labels: ['2015', '2016', '2017', '2018', '2019', '2020'],
            tooltip: 'hide',
            lock_to_ticks: true
        }); 
        $("#mem_ram").slider({
            ticks: [0, 1, 2, 3, 4, 6, 8, 10, 12, 16],
            value: [0, 16],
            ticks_positions: [0, 10, 20, 30, 40, 50, 60, 70, 80, 100],
            tooltip: 'hide',
            ticks_labels: ['512 MB', '1 GB', '2 GB', '3 GB', '4 GB', '6 GB', '8 GB', '10 GB', '12 GB', '16 GB'],
            lock_to_ticks: true
        }); 
        $("#mem_int").slider({
            ticks: [0, 1, 2, 4, 8, 16, 32, 64, 128, 256, 512],
            ticks_positions: [0, 9.09, 18.18, 27.27, 36.36, 45.45, 54.54, 63.63, 72.72, 81.81, 100],
            value: [0, 512],
            tooltip: 'hide',
            ticks_labels: ['512 MB', '1 GB', '2 GB', '4 GB', '8 GB', '16 GB', '32 GB', '64 GB', '128 GB', '256 GB', '512 GB'],
            lock_to_ticks: true
        });
        $("#display").slider({
            value: [4, 7],
            min: 4,
            max: 7,
            tooltip_position: 'bottom',
            step: 0.1
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