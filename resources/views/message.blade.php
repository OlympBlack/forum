@include('layouts/header')


        <style>
            .message{
                width: 70%;
                border-radius: 20px 0%;
                border: 1px solid blue;
            }
            .contenu{
                font-size: 16px;
                text-align: justify;
                margin-right: 20px;
            }
        </style>
    
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
                    
                     <!--<div class="dropdown " >
                                    <button style=" color: white;" class="btn  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <p class="bi-person custom-icon me-3"></p>
                                    </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <p>{{ Auth::user()->name }}</p>
                                    </li>
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
                   <div class="d-lg-none">
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


<section class="team section-padding">
    <div class="container mt-5">
        <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                

                <div class="card-body">
                    <form action="{{ route('message.store', $recipient_id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="content">Message</label>
                            <textarea class="form-control" id="content" name="contenu" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
               
        <div class="col-md-8">
                 
            <div class="card">
                <div class="card-header">Conversation avec </div>

                <div class="card-body" style="overflow-y: auto; max-height: 400px;">
                        @foreach ($messages as $message)
                            <div class="media mb-3 offset-2 {{ $message->sender_id === auth()->id() ? 'bg-primary text-white' : 'bg-white text-dark' }} message">
                                <div class="media-body">
                                    <h6 class="mt-0 offset-2">{{ $message->sender->name }}</h6>
                                    <p class="offset-1  contenu">{{ $message->contenu }}</p>
                                </div>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
</section>



@include('layouts/footer')


