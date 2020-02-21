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
                    {{ Form::input('text', 'brand', old('brand'), array('class' => 'form-control', 'id' => 'brand')) }}
                    {{ Form::label('name', 'Device Name') }}
                    {{ Form::input('text', 'name', old('name'), array('class' => 'form-control', 'id' => 'name')) }}
                    {{ Form::label('year', 'Launch Year') }}
                    {{ Form::select( 'year', ['2015' => '2015', '2016' => '2016', '2017' => '2017', '2018' => '2018', '2019' => '2019', '2020' => '2020'], null, array('class' => 'form-control', 'id' => 'year')) }}
                    {{ Form::label('chipset', 'Chipset') }}
                    {{ Form::select('chipset', ['L' => 'TesteL', 'S' => 'TesteS'], null, array('class' => 'form-control', 'id' => 'chipset')) }} <br />
                    {{ Form::submit('Salvar', array('class' => 'btn btn-group btn-primary', 'id' => 'submit')) }}
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
        if($('#year').val() == ''){
            $('#year').val('2015');
        }
    });
</script>
@endsection