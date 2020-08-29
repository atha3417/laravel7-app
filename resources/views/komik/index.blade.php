@extends('layouts.main')

@section('title', 'Comic')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <a href="/comic/create" class="btn btn-primary mt-3">Add New Comic</a>
            <h1 class="mt-2">Comic List</h1>
            @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cover</th>
                            <th scope="col">Title</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($comics as $comic)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>
                                <img src="/img/{{ $comic['sampul'] }}" class="cover img-thumbnail">
                            </td>
                            <td>{{ $comic['judul'] }}</td>
                            <td>
                                <a href="/comic/{{ $comic['slug'] }}" class="badge badge-pill badge-secondary">detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $comics->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
