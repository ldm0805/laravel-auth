@extends('layouts.admin')
@section('content')
    <div class="container-fluid show">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <h2>Dettaglio Project: {{$project->title}}</h2>
                    <a href="{{route('admin.projects.index')}}" class="btn btn-sm btn-primary">Torna all'elenco</a>
                </div>
            </div>
            <div class="col-12">
                <p>
                    <strong>
                        Slug:
                    </strong>
                    {{$project->slug}}
                </p>
                <p>
                    <strong>
                        Contenuto:
                    </strong>
                    {{$project->content}}
            </div>
        </div>
    </div>
@endsection