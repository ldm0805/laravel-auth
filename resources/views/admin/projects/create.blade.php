@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Aggiungi nuovo post</h2>
        </div>
        <div class="col-12">
            <form action="{{route('admin.projects.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label class="control-label">
                    Titolo
                </label>
                <input type="text" class="form-control" placeholder="Titolo" id="title" name ="title">
            </div>
            <div class="form-group">
                <label class="control-label">
                    Contenuto
                </label>
                <textarea type="text-area" class="form-control" placeholder="Contenuto" id="content" name ="content"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-sm btn-success">Salva</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection