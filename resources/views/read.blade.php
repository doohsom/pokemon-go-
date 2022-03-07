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
        <a href="{{ route('home.pokemon') }}" class="searchButton">
            Home
        </a>
    </div>
<div class="gallery">
    @if($status === 'failure')
        <p> Nothing to do here</p>
    @else
        <div class="content" style="width: 65%">
            <div style="width: 100%; display: inline-block">
                <div class="child left-div">
                    <img src="{{ $response->image }}">
                    <h3>{{ ucfirst($response->identifier) }}</h3>
                </div>
                <div class="child middle-div">
                    <p>Weight : {{ $response->weight }} </p>
                    <p>Height : {{ $response->height }} </p>
                    <p>Types : {{ $response->height }} </p>
                    <h6>Species: {{  (is_null($response->species)) ? 'n/a' : $response->species->identifier }}</h6>
                </div>
                <div class="child right-div">
                    <h3 style="text-align: left">Stats</h3>
                    @foreach($response->stats as $stat)
                        <p style="text-align: left">{{ $stat->identifier }} : {{ $stat->base_stat }}</p>
                    @endforeach
                </div>
            </div>
            @endif


        </div>
</div>
</body>
</html>
