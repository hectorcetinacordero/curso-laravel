@extends('layouts.guest')

@section('content')
    <h1>Posts</h1>
        @foreach ($posts as $post)
        <div class="py-4">
            <img src="{{$post->image}}" alt="{{$post->title}}">
            <h1 class="text-red-700">{{$post->title}}</h1>
            <p>{{$post->body}}</p>
            <a href="{{url('post',$post->slug)}}" target="_blank" class="text-blue-400 underline">Ver Post</a>
        </div>
    @endforeach
@endsection