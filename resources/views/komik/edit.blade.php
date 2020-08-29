@extends('layouts.main')

@section('title', 'Edit Comic')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Edit Comic</h2>
            <form action="/comic/{{ $comic['slug'] }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <input type="hidden" name="oldCover" value="{{ $comic['sampul'] }}" hidden>
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') ? old('title') : $comic['judul'] }}" autofocus autocomplete="off">
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="author" class="col-sm-2 col-form-label">Author</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{ old('author') ? old('author') : $comic['penulis'] }}" autocomplete="off">
                        @error('author')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('publisher') is-invalid @enderror" id="publisher" name="publisher" value="{{ old('publisher') ? old('publisher') : $comic['penerbit'] }}" autocomplete="off">
                        @error('publisher')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cover" class="col-sm-2 col-form-label">Cover</label>
                    <div class="col-sm-2">
                        <img src="/img/{{ $comic['sampul'] }}" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control @error('cover') is-invalid @enderror" id="cover" name="cover" onchange="previewImg()">
                            @error('cover')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <label class="custom-file-label" for="cover">Choose image</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 offset-2 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Edit comic</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
