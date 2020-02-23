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
                    <table class="table">
                        <thead>
                            <th>Brand: </th>
                            <th>Name: </th>
                            <th>Year: </th>
                            <th>Main Camera: </th>
                            <th>Battery: </th>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach($smartphones as $smartphone)
                                <tr>
                                    <td>{{ ucfirst($smartphone->brand) }}</td>
                                    <td>{{ ucfirst($smartphone->name) }}</td>
                                    <td>{{ $smartphone->year }}</td>
                                    <td>{{ $smartphone->main_cam }}MP</td>
                                    <td>{{ $smartphone->battery }}mAh</td>
                                    <td>
                                        <a class="btn btn-primary a-btn-slide-text" href="/smartphones/{{$smartphone->id}}/edit"><i class="fas fa-edit"></i></a>
                                    </td>
                                    <td>
                                        {{ Form::open(['method' => 'delete', 'url' => 'smartphones/'.$smartphone->id]) }}
                                            <button class="btn btn-primary a-btn-slide-text" type="submit"><i class="fas fa-trash-alt"></i></button>
                                        {{ Form::close() }}
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection