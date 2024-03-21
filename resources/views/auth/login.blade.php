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

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link rel="stylesheet" href="css/slick.css"/>

        <link href="css/tooplate-little-fashion.css" rel="stylesheet">
        

<style>
    body{
       // background-color: white;
        background-image: url('images/login/b1.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        
    }
</style>
    </head>
<section class="preloader">
            <div class="spinner">
                <span class="sk-inner-circle"></span>
            </div>
        </section>
    
        <main>

            <section class="sign-in-form section-padding y">
                <div class="container  ">
                    <div class="row">

                        <div class="col-lg-8 mx-auto col-12">

                            <h3 class="hero-title text-center mb-5" style="color: white;">Connectez-vous</h3>

                            <div class="row">
                                <div class="col-lg-8 col-11 mx-auto">
                                    <form role="form" method="post" action="{{route('login')}}">
                                        @csrf
                                        <label for="" style="color: white;">Adresse mail</label>
                                        <div class="form-floating mb-4 p-0">
                                            <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="" required style="border: 1px solid #FF4400;>

                                            <label for="email" >Adresse mail</label>
                                            @error('email')
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <label for="" style="color: white;">Mot de passe</label>
                                        <div class="form-floating p-0">
                                            <input type="password" name="password" id="password" class="form-control " placeholder="" required style="border: 1px solid #FF4400;>

                                            <label for="password">Password</label>
                                            @error('password')
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn custom-btn form-control mt-4 mb-3" style="background-color: #FF4400;">
                                            Connecter
                                        </button>

                                        <p class="text-center text-light">N'avez-vous pas de compte ? <a href="{{route('register')}}" style="color: #FF4400;">Créer un compte</a></p>

                                    </form>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                </div>
            </section>

        </main>

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/Headroom.js"></script>
        <script src="js/jQuery.headroom.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>