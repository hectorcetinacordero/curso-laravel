@extends('layouts.guest')

@section('content')
    <h1>Posts</h1>
        @foreach ($posts as $post)
        <div class="py-4">
            <img src="{{$post->image}}" alt="{{$post->title}}">
            <h1 class="text-red-700">{{$post->title}}</h1>
            <p>{{$post->body}}</p>
            <a href="{{route('view',['slug'=>$post->slug])}}" target="_blank" class="btn bg-blue-500 p-2">Ver Post</a>
            <form action="{{route('destroy',['id'=>$post->id])}}" method="POST">
                @csrf
                <button class="btn bg-red-500 p-2">Eliminar Post</button>
            </form>
            
        </div>
    @endforeach
@endsection