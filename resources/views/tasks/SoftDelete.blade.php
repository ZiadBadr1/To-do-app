<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Deleted Tasks</title>
</head>
<body >
<x-app-layout>
    <x-slot name="header" @style("bg-dark")>
        <h2 class="font-semibold text-xl bg text-gray-800 dark:text-black-200 leading-tight">
            {{ __('Deleted Tasks') }}
        </h2>
    </x-slot>

    <br>
    <table class="table">
    <thead>
    <tr class="text-white">
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Comment</th>
        <th scope="col">pro</th>

    </tr>
    </thead>
    <tbody class="text-white">
    @foreach($tasks as $task)
        <tr>
            <th scope="row">#</th>
            <td>{{$task->title}}</td>
            <td>{{$task->comment}}</td>
            <td>
                <a class="btn btn-primary" href="{{route('tasks.restore',$task->id)}}" role="button">Restore</a>
{{--                <form method="post" action="{{route("tasks.delete",$task->id)}}">--}}
{{--                    @method('DELETE')--}}
{{--                    @CSRF--}}
{{--                    <button  type="submit" style="background-color: crimson ;margin-top: 10px">Delete</button>--}}
{{--                </form>--}}
                 <a class="btn btn-danger" href="{{route('tasks.delete',$task->id)}}" role="button">Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<a class="btn btn-success" href="{{route('tasks.index')}}" role="button" style="margin-right: 25px ; margin-left: 700px">Tasks</a>

</x-app-layout>

</body>
</html>
