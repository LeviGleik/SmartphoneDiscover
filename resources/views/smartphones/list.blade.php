@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
				Smartphones
            	<div class="col-md-offset-2 float-right">
                    <a class="btn btn-primary btn-sm" href="{{ url('smartphones/form') }}">Add</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th style="text-align: center;">@sortablelink('brand')</th>
                        <th style="text-align: center;">@sortablelink('name')</th>
                        <th style="text-align: center;">@sortablelink('main_cam', 'Main Camera')</th>
                        <th style="text-align: center;">@sortablelink('price')</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach($smartphones as $smartphone)
                            <tr>
                                <td style="text-align: center;">{{ ucfirst($smartphone->brand) }}</td>
                                <td style="text-align: center;">{{ ucfirst($smartphone->name) }}</td>
                                <td style="text-align: center;">{{ $smartphone->main_cam }}MP</td>
                                <td style="text-align: center;">{{ $smartphone->price }} R$</td>
                                <td>
                                    <a class="btn btn-primary a-btn-slide-text btn-sm" href="/smartphones/{{$smartphone->id}}/edit"><i class="fas fa-edit fa-sm"></i></a>
                                </td>
                                <td>
                                    {{ Form::open(['method' => 'delete', 'url' => 'smartphones/'.$smartphone->id]) }}
                                        <button class="btn btn-danger a-btn-slide-text btn-sm" type="submit"><i class="fas fa-trash-alt fa-sm"></i></button>
                                    {{ Form::close() }}
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $smartphones->appends(\Request::except('page'))->render() }}
            </div>
        </div>
    </div>
</div>
@endsection