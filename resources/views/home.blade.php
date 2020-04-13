@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">Welcome</div>
                <div class="card-body">
                	<div class="row">
	                	<div class="col-md btn btn-outline-primary">	
		                    Iniciante
	                	</div>
	                	<div class="col-md btn btn-outline-primary">	
		                    Intermediário
	                	</div>
	                	<div class="col-md btn btn-outline-primary">	
		                    Avançado
	                	</div>
	                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
