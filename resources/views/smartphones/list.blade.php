@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                Smartphones
                @auth
                <div class="col-md-offset-2 float-right">
                    <a class="btn btn-outline-primary btn-sm" href="{{ url('smartphones/form') }}">Add</a>
                    <a class="btn btn-outline-primary btn-sm" href="{{ url()->previous() }}">Back</a>
                </div>
                @endauth
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th style="text-align: center;">Brand</th>
                        <th style="text-align: center;">Name</th>
                        <th style="text-align: center;">Main Camera</th>
                        <th style="text-align: center;">Internal Memory</th>
                        <th style="text-align: center;">Price</th>
                        @auth
                        <th></th>
                        <th></th>
                        @endauth
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach($smartphones as $smartphone)
                            <tr>
                                <td style="text-align: center;">{{ strtoupper($smartphone->brand) }}</td>
                                <td style="text-align: center;">{{ ucfirst($smartphone->name) }}</td>
                                <td style="text-align: center;">{{ $smartphone->main_cam }}MP</td>
                                <td style="text-align: center;">{{ $smartphone->mem_int }}GB</td>
                                <td style="text-align: center;">R$ {{ $smartphone->price }}</td>
                                @auth
                                <td>
                                    <a class="btn btn-outline-primary btn-sm" href="/smartphones/{{$smartphone->id}}/edit"><i class="fas fa-edit fa-sm"></i></a>
                                </td>
                                @endauth
                                <td>
                                    <a class="btn btn-outline-primary btn-sm" href="/smartphones/{{$smartphone->id}}/view"><i class="fas fa-eye fa-sm"></i></a>
                                </td>
                                @auth
                                <td>
                                    {{ Form::open(['method' => 'delete', 'url' => 'smartphones/'.$smartphone->id]) }}
                                        <button class="btn btn-outline-danger btn-sm" type="submit"><i class="fas fa-trash-alt fa-sm"></i></button>
                                    {{ Form::close() }}
                                </td>
                                @endauth

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $smartphones->links() }}
                {{ $smartphones->total() }}
                results.
            </div>
        </div>
    </div>
</div>
@endsection