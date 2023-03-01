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
</div>
<div id="index">
    @foreach($projects as $project)
        <section class="card">
            <article class="containerImagenCard">
                <img src="https://cdn.pixabay.com/photo/2018/02/07/14/27/pension-3137209_640.jpg" alt="">
            </article>
            <article class="containerDescriptionCard">
                <p class="titleCard">{{$project->id}}. {{$project->title}}</p>
                <p class="titleCard">{{$project->date_project}}</p>
                <p class="tecnologiesCard">{{$project->slug}}</p>
                <p class="descriptionCard">{{$project->content}}</p>
                <a class="btn btn-sm btn-square btn-primary" href="{{route('admin.projects.show', $project->slug)}}" title="Visualizza project"><i class="fas fa-eye"></i></a>
                <a class="btn btn-sm btn-square btn-warning" href="{{route('admin.projects.edit', $project->slug)}}" title="Modifica project"><i class="fas fa-edit"></i></a>
            </article>
            <div class="d-flex justify-content-end m-3">
                <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger bnt-sm btn-square" type="submit" value="Cancella project">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </div>
            </section>
    @endforeach
</div>
@endsection