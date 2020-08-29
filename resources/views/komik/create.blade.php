@extends('layouts.main')

@section('title', 'Create New Comic')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Add New Comic</h2>
            <form action="/comic" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" autofocus autocomplete="off">
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="author" class="col-sm-2 col-form-label">Author</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author" value="{{ old('author') }}" autocomplete="off">
                        @error('author')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('publisher') is-invalid @enderror" id="publisher" name="publisher" value="{{ old('publisher') }}" autocomplete="off">
                        @error('publisher')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cover" class="col-sm-2 col-form-label">Cover</label>
                    <div class="col-sm-2">
                        <img src="/img/default.jpg" class="img-thumbnail img-preview">
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
                        <button type="submit" class="btn btn-primary">Add comic</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
