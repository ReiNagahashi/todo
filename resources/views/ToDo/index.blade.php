@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Todos</div>

    <div class="card-body">
            @if(count($todos) > 0)
        <table class="table table-striped">
            <thead>
              <tr>
                <th>Title</th>
                <th colspan="2"></th>
              </tr>
            </thead>
            <tbody>
               {{-- ここで繰り返し処理を行うことで、$todosに含まれた変数を順番に処理してくれる --}}
                    @foreach($todos as $todo)
                        <tr>
                        <td>{{$todo->title}}</td>  
                        <td>
                        <a href="{{route ('show.todos',['id' => $todo->id])}}" class="btn btn-xs btn-primary">View</a>
                        </td>
                        <td>
                            {{-- <a href="{{ route('todos.delete',['id' => $todo->id])}}"
                                 class="btn btn-danger btn-xs">Delete</a>     --}}
                            {{-- <a href="/todos/{{ $todo->id}}"
                                class="btn btn-danger btn-xs">Delete</a>  --}}
                        </td>
                        <td>
                    @if($todo->complete)
                    {{-- ここのifないの条件は値がtrueすなわち1であるかどうかを表したもの→つまりまずはelseが処理された後にifが処理される --}}
                        <a href="{{route ('todos.not_complete',['id' => $todo->id])}}" class="btn bnt-xs btn-info">done</a>
                    @else
                    <a href="{{route ('todos.complete',['id' => $todo->id])}}" class="btn bnt-xs btn-info">Complete</a>
                    @endif
                        </td>  
                        </tr>
                     @endforeach
                @else
            <tr>
                <td class="text-center" colspan="3">No todos found</td>
            </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>

@endsection