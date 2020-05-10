@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">Welcome</div>
                <div class="card-body">
                	<div class="row">
            			<a class="col btn btn-outline-primary" href="/home/beginner" style="{{active_menu(Route::currentRouteName(), 'beginner')}}">
		                    Beginner
            			</a>
                		<a class="col btn btn-outline-primary" href="/home/intermediate" style="{{active_menu(Route::currentRouteName(), 'intermediate')}}">
		                    Intermediate
            			</a>
            			<a class="col btn btn-outline-primary" href="/home/advanced" style="{{active_menu(Route::currentRouteName(), 'advanced')}}">
		                    Advanced
            			</a>
	                </div>
                </div>
	            @yield('beginner')
	            @yield('intermediate')
	            @yield('advanced')
            </div>
        </div>
    </div>
</div>
@endsection
