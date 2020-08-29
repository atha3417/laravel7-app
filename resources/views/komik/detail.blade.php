@extends('layouts.main')

@section('title', 'Detail Comic')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Detail Comic</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="/img/{{ $comic['sampul'] }}" class="card-img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $comic['judul'] }}</h5>
                            <p class="card-text"><b>Author :</b> {{ $comic['penulis'] }}</p>
                            <p class="card-text">
                                <small class="text-muted"><b>Publisher :</b> {{ $comic['penerbit'] }}</small>
                            </p>
                            <a href="/comic/{{ $comic['slug'] }}/edit" class="btn btn-success">edit</a>

                            <form action="/comic/{{ $comic['slug'] }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this comic ?')">delete</button>
                            </form>
                            <br><br>
                            <a href="/comic" class="btn btn-sm btn-primary">Back to comic list</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
