@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">Welcome</div>
                <div class="card-body">
                	<div class="row">
                		<a class="col btn btn-outline-primary" href="/home/intermediate" style="{{active_menu(Route::currentRouteName(), 'intermediate')}}">
		                    Intermediate
            			</a>
            			<a class="col btn btn-outline-primary" href="/home/advanced" style="{{active_menu(Route::currentRouteName(), 'advanced')}}">
		                    Advanced
            			</a>
	                </div>
                </div>
                <!-- <div>
                    <p><h1 class="text-center">Welcome to SmartphoneDiscover</h1></p>
                </div> -->
	            @yield('intermediate')
	            @yield('advanced')
            </div>
        </div>
    </div>
</div>
@endsection
