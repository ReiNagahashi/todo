@extends('layouts.app')

@section('content')

<h1 class="text-center">Single Todo Details</h1>
        <div class="card">
            <div class="card-header">{{$todo->title}}</div>
            <div class="card-body">
                <p>{{$todo->description}}</p>
                <a href="{{route('todos.edit',['id' => $todo->id])}}"
                    class="btn btn-primary btn-xs float-right  ml-2">Edit</a>
          <form action="/todos/{{$todo->id}}"method="POST">
            @csrf 
            @method('DELETE')
                <button type="submit"class="btn btn-xs btn-danger float-right">Delete</button>
            </form>
            </div>
        </div>
@endsection