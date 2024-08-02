@extends('layouts.guest')

@section('content')
    <h1 class="text-red-700">{{$post->title}}</h1>
    <img src="{{$post->image}}" alt="{{$post->title}}">
    <p>{{$post->body}}</p>
@endsection