@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
					Smartphones
                	<div class="col-md-offset-2 float-right">
                        <a class="btn btn-primary btn-sm" href="{{ url('smartphones/form') }}">Add</a>
                    </div>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection