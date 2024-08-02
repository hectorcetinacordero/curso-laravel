@extends('layouts.guest')

@section('content')
@if ($errors->any())
        <div class="error-container">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<form action="{{route('update',$post)}}" method="POST">
    @csrf
    @method('PUT')
    <input name="title" type="text" value="{{$post->title}}">
    <input name="image" type="text" value="{{$post->image}}">
    <textarea name="body" cols="30" rows="10">{{$post->body}}</textarea>
    <button>GUARDAR</button>
</form>


@endsection