@extends('layouts.app')

@section('content')
<h1>{{$title}}</h1>

@if(count($services) > 0)
    <ul class="list-group">
        @foreach ($services as $service)
            <li class="list-group-item">
                {{$service}}
            </li>
        @endforeach
    </ul>
@else
    <p>No services available at the moment</p>
@endif
@endsection