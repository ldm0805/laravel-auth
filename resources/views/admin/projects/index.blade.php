@extends('layouts.admin')
@section('content')
<div class="text-center mt-4">
    <h1>Benvenuto nei tuoi projects!</h1>
</div>
<div>
    <a href="{{route('admin.projects.create')}}" class="btn btn-success">
        <i class="fa-solid fa-square-plus fa-lg fa-fw"></i>
        Aggiungi Nuovo project
    </a>
    <div class="mt-3">
        @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
        @endif
    </div>
    <div class="mt-3">
        @if(session('messagedelete'))
        <div class="alert alert-danger">
            {{session('messagedelete')}}
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
            </article>
            <div class="d-flex justify-content-end m-3">
                <form action="{{route('admin.projects.destroy', ['project' => $project['slug']] )}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input class="btn btn-danger" type="submit" value="Cancella post">
                </form>
            </div>
            </section>
    @endforeach
</div>
@endsection