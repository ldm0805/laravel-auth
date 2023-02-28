@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center m-4">
            <h2>Aggiungi nuovo project</h2>
        </div>
        <div class="col-12">
            <form action="{{route('admin.projects.store')}}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label class="control-label mb-2">
                    Titolo
                </label>
                <input type="text" class="form-control" placeholder="Titolo" id="title" name ="title">
            </div>
            <div class="form-group mb-3">
                <label class="control-label mb-2">
                    Contenuto
                </label>
                <textarea type="text-area" class="form-control" placeholder="Contenuto" id="content" name ="content"></textarea>
            </div>
            <div class="form-group mb-3">
                <button type="submit" class="btn btn-sm btn-success">Salva</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection