<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sitiari</title>
        <link rel="stylesheet" href="/css/app.css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>

        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light bg-light">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
              
                <ul class="navbar-nav mr-auto">
                    <a class="navbar-brand" href="#">Sitiari</a>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Register
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('majikan.register') }}">Sebagai Majikan</a>
                            <a class="dropdown-item" href="{{ route('pekerja.register') }}">Sebagai Pekerja</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Login
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('majikan.login') }}">Sebagai Majikan</a>
                            <a class="dropdown-item" href="{{ route('pekerja.login') }}">Sebagai Pekerja</a>
                        </div>
                    </li>
                        {{-- <li class="nav-item">
                            <a href="" class="nav-link">About</a>
                        </li> --}}
                    
                </ul>
            </nav>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="jumbotron bg-light">
                        <h1 class="display-4 text-center">Selamat Datang di Sitiari</h1>
                        <p class="lead text-center">Silahkan Mendaftar atau Login Menggunakan Email dan Password</p>
                        {{-- <hr class="my-5">
                        <div class="col text-center">
                        <a class="btn btn-primary btn-lg" href="{{ route('majikan.register') }}" role="button">Daftar Sebagai Majikan</a>
                        <a class="btn btn-primary btn-lg" href="{{ route('pekerja.register') }}" role="button">Daftar Sebagai Pekerja</a>
                        </div> --}}                
                    </div>
                </div>
                <div class="col-2"></div>                
            </div>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                          <a class="nav-link" href="/pembantu">Pembantu</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="/perawat" >Perawat</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active" href="/babysitter" >Babysitter</a>
                        </li>
                    </ul>   
                    <div class="container">
                        <br>
                        <div class="row">
                            @foreach ($babysitter as $item)
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="../storage/img/profile/{{$item->detailPekerja->fotoDiri}}" class="card-img-top">
                                    <div class="card-body">
                                        @php
                                            $ttl = \Carbon\Carbon::parse($item->detailPekerja->ttl)->age;
                                        @endphp
                                        <h5 class="card-title">{{$item->name}}</h5>
                                        <p class="card-text">Usia : {{$ttl}}</p>
                                        <p class="card-text">Alamat : {{$item->detailPekerja->alamat}}</p>
                                        <p class="card-text">Agama : {{$item->detailPekerja->agama}}</p>
                                        <p class="card-text">Gaji : {{$item->gaji}}</p>
                                        <p class="card-text">Keahlian : {{$item->detailPekerja->keahlian}}</p>
                                        @php $rating = $item->detailPekerja->rating; @endphp  
                    
                                        @foreach(range(1,5) as $i)
                                            <span class="fa-stack" style="width:20px">
                                            <i class="far fa-star fa-stack-1x" style="color:gold;"></i>
                    
                                            @if($rating >0)
                                                @if($rating >0.5)
                                                    <i class="fas fa-star fa-stack-1x" style="color:gold;"></i>
                                                @else
                                                    <i class="fas fa-star-half fa-stack-1x" style="color:gold;"></i>
                                                @endif
                                            @endif
                                            @php $rating--; @endphp
                                            </span>
                                        @endforeach
                                        <br>
                                        <a href="/majikan"><button class="btn btn-success">Pesan</button></a>
                                    </div>
                                </div>               
                            </div>     
                            @endforeach       
                        </div>
                        {{$babysitter->links()}}
                    </div>                 
                </div>
                <div class="col-2"></div>            
            </div>
        </div>
        <script src="/js/app.js"></script>




        {{-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div> --}}
    </body>
</html>
