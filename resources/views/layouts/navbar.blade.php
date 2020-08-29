@php
$url = explode('/', url()->current());
@endphp

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Atha Tsaqif</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link @empty($url) active @endempty" href="/">Home</a>
                <a class="nav-item nav-link @if($url == 'about') active @endif" href="/about">About</a>
                <a class="nav-item nav-link @if($url == 'contact') active @endif" href="/contact">Contact</a>
                <a class="nav-item nav-link @if($url == 'comic') active @endif" href="/comic">Comic</a>
            </div>
        </div>
    </div>
</nav>
