@extends('layouts.main')

@section('title', 'Contact Us')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Contact Us</h2>
            @foreach($alamat as $a)
            <ul>
                <li>{{ $a['tipe'] }}</li>
                <li>{{ $a['alamat'] }}</li>
                <li>{{ $a['kota'] }}</li>
            </ul>
            @endforeach
        </div>
    </div>
</div>
@endsection