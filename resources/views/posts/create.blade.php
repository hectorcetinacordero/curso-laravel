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
<form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="author_id">Autor</label><br>
    <input name="author_id" id="author_id" type="text" value="{{@old('title',$post->author_id)}}">
    <br>
    <label for="title">Titulo</label><br>
    <input name="title" id="title" type="text" value="{{@old('title',$post->title)}}">
    <br>
    <label for="image">URL imagen</label><br>
    <input name="image" id="image" type="file">
    <br>
    <label for="body">Contenido</label><br>
    <textarea name="body" id="body" cols="30" rows="10">{{@old('body',$post->body)}}</textarea>
    <br>
    <button class="bg-blue-500 p-2">GUARDAR</button>
</form>


@endsection

<script>
    document.querySelector('form').addEventListener('submit', function(event) {
        event.preventDefault();
    
        var formData = new FormData(this);
    
        fetch('{{route('posts.store')}}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        })
        .then(response => response.json())
        .then(data => {
            // Handle success response, e.g., display success message or redirect
            console.log(data);
        })
        .catch(error => {
            // Handle error response, e.g., display error message
            console.error(error);
        });
    });
    </script>