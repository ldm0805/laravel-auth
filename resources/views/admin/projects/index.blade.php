@extends('layouts.admin')
@section('content')
<div>
    <h1>Elenco posts</h1>
</div>
<div>
    <a href="{{route('admin.projects.create')}}" class="btn btn-success">Add new</a>
    <div class="mt-3">
        @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
        @endif
    </div>
</div>
<div id="index">
    @foreach($projects as $project)
        <section class="card">
            <article class="containerImagenCard">
                <img src="https://cdn.pixabay.com/photo/2018/02/07/14/27/pension-3137209_640.jpg" alt="">
            </article>
            <article class="containerDescriptionCard">
                <p class="titleCard">{{$project->id}}. {{$project->title}}</p>
                <p class="tecnologiesCard">{{$project->slug}}</p>
                <p class="descriptionCard">{{$project->content}}</p>
                <form action="{{route('admin.projects.destroy', ['project' => $project['slug']] )}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input class="btn btn-danger" type="submit" value="Cancella post">
                  </form>
            </article>
        </section>
    @endforeach
</div>
@endsection