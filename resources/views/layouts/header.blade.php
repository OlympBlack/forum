<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Christ forum</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">

        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/bootstrap-icons.css" rel="stylesheet">

        <link rel="stylesheet" href="/css/slick.css"/>

        <link href="/css/tooplate-little-fashion.css" rel="stylesheet">

       


 


        

    </head>
    
    <body>

        <!--<section class="preloader">
            <div class="spinner">
                <span class="sk-inner-circle"></span>
            </div>
        </section>-->
    
        <main>

            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <a class="navbar-brand" href="index.html">
                        <strong><span>Christ</span> Forum</strong>
                    </a>
                    
                     <div class="d-lg-none d-md-none d-sm-block">
                        <div class="dropdown " >
                                    <button style=" color: white;" class="btn  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <p class="bi-person custom-icon me-3"></p>
                                    </button>
                                <ul class="dropdown-menu">
                                    
                                    <li>
                                        <x-dropdown-link href="{{ route('profile.show') }}">
                                            {{ __('Profile') }}
                                        </x-dropdown-link>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                        <x-responsive-nav-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                            </x-responsive-nav-link>
                                        </form>
                                    </li>
                                    
                                </ul>
                            </div>
                     </div>
                   <!--<div class="d-lg-none">
                        <a href="sign-in.html" class="bi-person custom-icon me-3"></a>

                        <a href="product-detail.html" class="bi-bag custom-icon"></a>
                    </div>-->

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="nav-link active " href="{{route('dashboard')}}">Acceuil</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-dark" href="{{route('story.index')}}">Story</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-dark" href="{{route('publication.index')}}">Publication</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-dark" href="{{route('message.index')}}">Discusion</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark" href="../activite_culturelle">Activité C</a>
                            </li>

                            

                            
                        </ul>

                        <div class="d-none d-lg-block">
                            <!--<a href="sign-in.html" class="bi-person custom-icon me-3"></a>-->
                            <div class="dropdown " >
                                    <button style="background-color: rgb(212, 92, 18); color: white;" class="btn  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                    </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <x-dropdown-link href="{{ route('profile.show') }}">
                                            {{ __('Profile') }}
                                        </x-dropdown-link>
                                    </li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                        <x-responsive-nav-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                            </x-responsive-nav-link>
                                        </form>
                                    </li>
                                    
                                </ul>
                            </div>
                            <!--<a href="product-detail.html" class="bi-bag custom-icon"></a>-->
                        </div>
                    </div>
                </div>
            </nav>




