@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
					Register
                    <div class="col-md-offset-2 float-right">
                        <a class="btn btn-primary btn-sm" href="{{ url('smartphones') }}">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    @if(Session::has('msg_success'))
                        <div class="alert alert-success">
                            {{ Session::get('msg_success') }}
                        </div>
                    @else
                    @if(Session::has('msg_update'))
                        <div class="alert alert-success">
                            {{ Session::get('msg_update') }}
                        </div>
                    @endif

                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(Request::is('*/edit'))
                        {{ Form::model($smartphones, ['method'  => 'PATCH', 'url' => 'smartphones/'.$smartphones->id]) }}
                    @elseif(Request::is('*/view'))
                        {{ Form::model($smartphones, ['method'  => 'PATCH', 'url' => 'smartphones/'.$smartphones->id]) }}
                    @else
                        {{ Form::open(['autocomplete' => 'off', 'url' => 'smartphones/save']) }}
                    @endif
                        {{ Form::label('brand', 'Brand') }}
                        {{ Form::select('brand', ['apple' => 'Apple', 'apple' => 'Apple', 'lg' => 'LG', 'motorola' => 'Motorola', 'samsung' => 'Samsung'], null, ['class' => 'selectpicker form-control', 'id' => 'brand']) }}
                    @if(Request::is('*/view'))
                        <script type="text/javascript">
                            $("#brand").prop("disabled", true);
                        </script>
                    @endif

                    {{ Form::label('name', 'Device Name') }}

                    @if(Request::is('*/view'))
                        {{ Form::input('text', 'name', null, ['disabled' => 'disabled', 'class' => 'form-control', 'id' => 'name']) }}
                    @else
                        {{ Form::input('text', 'name', null, ['autocomplete' => 'off', 'class' => 'form-control', 'id' => 'name']) }}
                    @endif
                        
                    <div class="box" id="countryList"></div>
                        
                    {{ Form::label('year', 'Launch Year') }}
                    <div class="form-control">
                        @if(Request::is('*/edit'))
                            {{ Form::input('number', 'year', null, ['id' => 'year', 'data-slider-value'=>$smartphones['year']]) }}
                        @elseif(Request::is('*/view'))
                            {{ Form::input('number', 'year', null, ['data-slider-enabled' => 'false', 'id' => 'year', 'data-slider-value'=>$smartphones['year']]) }}
                        @else
                            {{ Form::input('number', 'year', null, ['id' => 'year']) }}
                            @endif
                    </div> 
                        <br />

                    {{ Form::label('chipset', 'Chipset') }}
                    {{ Form::select('chipset', ['a13' => 'Apple A13 Bionic', 'a12z' => 'Apple A12Z Bionic', 'a12x' => 'Apple A12X Bionic', 'a12' => 'Apple A12 Bionic', 'a11' => 'Apple A11 Bionic', 'a10x' => 'Apple A10X Fusion', 'a10' => 'Apple A10 Fusion','a9x' => 'Apple A9X',  'a9' => 'Apple A9', 's865' => 'Snapdragon 865', 's855p' => 'Snapdragon 855+', 's855' => 'Snapdragon 855', 's845' => 'Snapdragon 845', 's835' => 'Snapdragon 835', 's821' => 'Snapdragon 821', 's820' => 'Snapdragon 820', 's765g' => 'Snapdragon 765G', 's730g' => 'Snapdragon 730G', 's730' => 'Snapdragon 730', 's712' => 'Snapdragon 712', 's710' => 'Snapdragon 710', 's675' => 'Snapdragon 675', 's670' => 'Snapdragon 670', 's665' => 'Snapdragon 665', 's660' => 'Snapdragon 660', 's652' => 'Snapdragon 652', 's650' => 'Snapdragon 650', 's636' => 'Snapdragon 636', 's630' => 'Snapdragon 630', 's625' => 'Snapdragon 625', 's450' => 'Snapdragon 450', 's439' => 'Snapdragon 439', 's435' => 'Snapdragon 435', 's430' => 'Snapdragon 430', 's425' => 'Snapdragon 425', 'e980' => 'Exynos 980', 'e9825' => 'Exynos 9825', 'e9820' => 'Exynos 9820', 'e9810' => 'Exynos 9810', 'e9611' => 'Exynos 9611', 'e9610' => 'Exynos 9610', 'e8895' => 'Exynos 8895', 'e8890' => 'Exynos 8890', 'e7904' => 'Exynos 7904', 'e7884' => 'Exynos 7884', 'e7870' => 'Exynos 7870', 'e7580' => 'Exynos 7580', 'e7420' => 'Exynos 7420', 'hx25' => 'Helio X25', 'hx20' => 'Helio X20', 'hx10' => 'Helio X10', 'hg90t' => 'Helio G90T', 'hp70' => 'Helio P70', 'hp65' => 'Helio P65','hp60' => 'Helio P60', 'hp25' => 'Helio P25', 'hp35' => 'Helio P35', 'hp23' => 'Helio P23', 'hp20' => 'Helio P20', 'hp10' => 'Helio P10', 'k990' => 'Kirin 990', 'k980' => 'Kirin 980', 'k970' => 'Kirin 970', 'k960' => 'Kirin 960', 'k659' => 'Kirin 659'], old('chipset'), ['class' => 'selectpicker form-control', 'id' => 'chipset']) }}
                    @if(Request::is('*/view'))                    
                        <script type="text/javascript">
                            $("#chipset").prop("disabled", true);
                        </script>
                    @endif

                    {{ Form::label('mem_ram', 'Ram Memory') }}
                        <div class="form-control">
                        @if(Request::is('*/edit'))
                            {{ Form::input('text','mem_ram', null, ['id' => 'mem_ram', 'data-slider-value' => $smartphones['mem_ram']]) }}
                        @elseif(Request::is('*/view'))
                            {{ Form::input('text','mem_ram', null, ['data-slider-enabled' => 'false', 'id' => 'mem_ram', 'data-slider-value' => $smartphones['mem_ram']]) }}
                        @else
                            {{ Form::input('text','mem_ram', null, ['id' => 'mem_ram']) }}
                        @endif
                            </div>
                        <br />

                    {{ Form::label('mem_int', 'Internal Memory') }}
                        <div class="form-control">
                        @if(Request::is('*/edit'))
                            {{ Form::input('text','mem_int', null, ['id' => 'mem_int', 'data-slider-value'=>$smartphones['mem_int']]) }}
                        @elseif(Request::is('*/view'))
                            {{ Form::input('text','mem_int', null, ['data-slider-enabled' => 'false', 'id' => 'mem_int', 'data-slider-value'=>$smartphones['mem_int']]) }}
                        @else                            
                            {{ Form::input('text','mem_int', null, ['id' => 'mem_int']) }}
                        @endif
                        </div>
                        <br />

                        @if(Request::is('*/edit'))
                        <div class="custom-control custom-checkbox">
                        {{ Form::input('checkbox', 'mem_exp_boolean', null, ['id' => 'mem_exp_boolean', $smartphones['mem_exp_boolean'] == 1 ? 'checked': '', 'class' => 'custom-control-input']) }}
                        {{ Form::label('mem_exp_boolean', 'External Memory', ['class' => 'custom-control-label']) }}
                        </div>

                        @elseif(Request::is('*/view'))
                        <div class="custom-control custom-checkbox">
                            {{ Form::input('checkbox', 'mem_exp_boolean', null, ['disabled' => 'disable', 'id' => 'mem_exp_boolean', $smartphones['mem_exp_boolean'] == 1 ? 'checked': '', 'class' => 'custom-control-input']) }}
                            {{ Form::label('mem_exp_boolean', 'External Memory', ['class' => 'custom-control-label']) }}
                        </div>

                        @else
                        <div class="custom-control custom-checkbox">
                            {{ Form::input('checkbox', 'mem_exp_boolean', null, ['id' => 'mem_exp_boolean', 'class' => 'custom-control-input']) }}

                            {{ Form::label('mem_exp_boolean', 'External Memory', ['class' => 'custom-control-label']) }}
                        </div>
                        @endif
                             
                        <br />

                        {{ Form::label('display', 'Display Size') }}
                        <div class="form-control">
                            @if(Request::is('*/edit'))
                            {{ Form::input('text', 'display', null, ['data-slider-id' =>'display', 'id' => 'display', 'data-slider-value'=>$smartphones['display']]) }}
                            @elseif(Request::is('*/view'))
                            {{ Form::input('text', 'display', null, ['data-slider-enabled' => 'false', 'data-slider-id' =>'display', 'id' => 'display', 'data-slider-value'=>$smartphones['display']]) }}
                            @else
                            {{ Form::input('text', 'display', null, ['data-slider-id' =>'display', 'id' => 'display']) }}
                            @endif
                        </div>
                        <br />

                        {{ Form::label('main_cam', 'Main Camera') }}
                        <div class="form-control">
                            @if(Request::is('*/edit'))
                            {{ Form::input('text','main_cam', null, ['id' => 'main_cam', 'data-slider-value'=>$smartphones['main_cam']]) }}
                            @elseif(Request::is('*/view'))
                            {{ Form::input('text','main_cam', null, ['data-slider-enabled' => 'false', 'id' => 'main_cam', 'data-slider-value'=>$smartphones['main_cam']]) }}
                            @else
                            {{ Form::input('text','main_cam', null, ['id' => 'main_cam']) }}
                            @endif
                        </div>
                        <br />

                        {{ Form::label('selfie_cam', 'Selfie Camera') }}
                        <div class="form-control">
                            @if(Request::is('*/edit'))
                            {{ Form::input('text','selfie_cam', null, ['id' => 'selfie_cam', 'data-slider-value'=>$smartphones['selfie_cam']]) }}
                            @elseif(Request::is('*/view'))
                            {{ Form::input('text','selfie_cam', null, ['data-slider-enabled' => 'false', 'id' => 'selfie_cam', 'data-slider-value'=>$smartphones['selfie_cam']]) }}
                            @else
                            {{ Form::input('text','selfie_cam', null, ['id' => 'selfie_cam']) }}
                            @endif
                        </div>
                        <br />

                        {{ Form::label('battery', 'Battery') }}
                        <div class="form-control">
                            @if(Request::is('*/edit'))
                            {{ Form::input('text', 'battery', null, ['data-slider-id' =>'battery', 'id' => 'battery', 'data-slider-value'=>$smartphones['battery']]) }}
                            @elseif(Request::is('*/view'))
                            {{ Form::input('text', 'battery', null, ['data-slider-enabled' => 'false', 'data-slider-id' =>'battery', 'id' => 'battery', 'data-slider-value'=>$smartphones['battery']]) }}
                            @else
                            {{ Form::input('text', 'battery', null, ['data-slider-id' =>'battery', 'id' => 'battery']) }}
                            @endif
                        </div>
                        <br />

                        {{ Form::label('price', 'Price') }}
                        <div class="form-control">
                            @if(Request::is('*/edit'))
                            {{ Form::input('text', 'price', null, ['data-slider-id' =>'price', 'id' => 'price', 'data-slider-value'=>$smartphones['price']]) }}
                            @elseif(Request::is('*/view'))
                            {{ Form::input('text', 'price', null, ['data-slider-enabled' => 'false', 'data-slider-id' =>'price', 'id' => 'price', 'data-slider-value'=>$smartphones['price']]) }}
                            @else
                            {{ Form::input('text', 'price', null, ['data-slider-id' =>'price', 'id' => 'price']) }}
                            @endif
                        </div>

                        {{ Form::label('antutu', 'Antutu') }}
                        @if(Request::is('*/view'))
                        {{ Form::number('antutu', old('antutu'), ['disabled' => 'disabled', 'class' => 'form-control']) }}
                        @elseif(Request::is('*/edit'))
                        {{ Form::number('antutu', old('antutu'), ['class' => 'form-control']) }}
                        @else
                        {{ Form::number('antutu', 0, ['class' => 'form-control']) }}
                        @endif

                        <br />
                        @if(!Request::is('*/view'))
                        {{ Form::submit('Save', ['class' => 'btn btn-group btn-primary', 'id' => 'submit']) }}
                        @endif
                    {{ csrf_field() }}
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
            formatter: function(value){
                return value;
            },
            lock_to_ticks: true
        }); 
        $("#mem_ram").slider({
            ticks: [0, 1, 2, 3, 4, 6, 8, 10, 12, 16],
            tooltip_position: 'bottom',
            ticks_positions: [0, 11.11, 22.22, 33.33, 44.44, 55.55, 66.66, 77.77, 88.88, 100],
            formatter: function(value){
                if(value == 0){
                    return "512 MB";
                }else{
                    return value + " GB";
                }
            },
            lock_to_ticks: true
        }); 
        $("#mem_int").slider({
            ticks: [0, 1, 2, 4, 8, 16, 32, 64, 128, 256, 512],
            tooltip_position: 'bottom',
            ticks_positions: [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100],
            formatter: function(value){
                if(value == 0){
                    return "512 MB";
                }else{
                    return value + " GB";
                }
            },
            lock_to_ticks: true
        });
        $("#main_cam").slider({
            ticks: [5, 10, 12, 16, 20, 30, 40, 48, 60, 64, 108],
            ticks_positions: [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100],
            tooltip_position: 'bottom',
            formatter: function(value){
                return value + "MP";
            },
            lock_to_ticks: true
        });
        $("#selfie_cam").slider({
            ticks: [5, 8, 10, 12, 16, 20, 30, 32, 40, 48, 60, 64, 108],
            ticks_positions: [0, 8.33, 16.66, 25, 33.3, 41.65, 49.98, 58.31, 64.61, 74.97, 83.3, 91.63, 100], 
            tooltip_position: 'bottom',
            formatter: function(value){
                return value + "MP";
            },
            lock_to_ticks: true
        });
        $("#display").slider({
            min: 4,
            max: 7,
            tooltip_position: 'bottom',
            step: 0.1
        });
        $("#battery").slider({
            min: 100,
            max: 6000,
            tooltip_position: 'bottom',
            formatter: function(value){
                return value + "mAh";
            },
            step: 100
        });
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
            step: 100
        });
        //  $('#name').keyup(function(){ 
        //     var query = $(this).val();
        //     if(query != '') {
        //      var _token = $('input[name="_token"]').val();
        //      $.ajax({
        //       url:"{{ route('smartphones.fetch') }}",
        //       method:"POST",
        //       data:{query:query, _token:_token},
        //       success:function(data){
        //        $('#countryList').fadeIn();  
        //        $('#countryList').html(data[1]);
        //        ldata(data[0]);
               
        //       }
        //      });
        //     }
        // });
        // function ldata(data){
        //     $(document).on('click', 'li', function(){  
        //         var id = $(this).prop("id")-1;
        //         // $("#name").val(data[$(this).val()].name);  
        //         // $("#brand").val(data[$(this).val()].brand);  
        //         $('#countryList').fadeOut();
        //         // if($("#name").is(":focus")){
        //         //     $("#countryList").fadeOut();
        //         // }
        //         // window.location.replace("/smartphones/"+$(this).val()+"/edit");
        //     });  
        // }

    });
</script>
<style type="text/css">
    .slider.slider-horizontal {
        width: 100%;
    }
    .tooltip.in {
        opacity: 100%;
    }
    #display .slider-selection {
        background: #8ac1ef;
    }
    #display .slider-handle {
        border-bottom-color: blue;
    }
    #battery .slider-selection {
        background: #8ac1ef;
    }
    #battery .slider-handle {
        border-bottom-color: blue;
    }
    #price .slider-selection {
        background: #8ac1ef;
    }
    #price .slider-handle {
        border-bottom-color: blue;
    }
    .box{
    width:600px;
    margin:0 auto;
   }
</style>
@endsection