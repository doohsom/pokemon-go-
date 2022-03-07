<!DOCTYPE html>
<html>
<head>
    <title>Responsive Ecommerce Product Cards In HTML/CSS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
<div class="wrap">
<?php //dd($responses); ?>
    <div class="search">
        <form action="{{ route('home.pokemon') }}" method="GET">
            <input type="text" class="searchTerm" placeholder="Search for a pokemon?" name="searchTerm">
            <button type="submit" class="searchButton">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </div>
</div>
<div class="gallery">
    @if($status === 'failure')
        <p> Nothing to do here</p>
    @else
        @foreach($responses as $response)
            <a href="{{ route('read.pokemon',['id' => $response->id ]) }}" class="content">
                <div >
                    <img src="{{ $response->image }} ">
                    <h3>{{ ucfirst($response->identifier) }}</h3>
                    <p>Weight : {{ $response->weight }} Height : {{ $response->height }} </p>
                    <h6>Species: {{  (is_null($response->species)) ? 'n/a' : $response->species->identifier }}</h6>
                </div>
            </a>
        @endforeach
    @endif
</div>
    @if($status === 'success')
        <nav aria-label="pagination">
            <ul class="pagination">
                <li><a href="{{ route('home.pokemon',['page' => $pagination->current_page - 1]) }}"><span aria-hidden="true">«</span><span class="visuallyhidden">previous</span></a></li>
                <li><a href="{{ route('home.pokemon',['page' => $pagination->current_page + 1])  }} "><span class="visuallyhidden">next</span><span aria-hidden="true">»</span></a></li>
            </ul>
        </nav>
    @endif
</body>
</html>
