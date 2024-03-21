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
        
<!--

Tooplate 2127 Little Fashion

https://www.tooplate.com/view/2127-little-fashion

-->
<style>
    body{
       // background-color: white;
        background-image: url('images/login/b1.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        
    }
</style>
    </head>
    
    <body>

        <section class="preloader" >
            <div class="spinner">
                <span class="sk-inner-circle"></span>
            </div>
        </section>
    
        <main>

            <section class="sign-in-form section-padding ">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 mx-auto col-12">

                            <h3 class="hero-title text-center text-light mb-5">Créer votre compte</h3>

                            <div class="social-login d-flex flex-column w-50 m-auto" >
                                
                                <a href="#" class="btn custom-btn social-btn mb-4" style="background-color: rgb(255, 85, 0);">
                                    <i class="bi bi-google me-3"></i>

                                    Continue with Google
                                </a>
                                
                                <a href="#" class="btn custom-btn social-btn bg-info">
                                    <i class="bi bi-facebook me-3"></i>

                                    Continue with Facebook
                                </a>
                            </div>  

                            <div class="div-separator w-50 m-auto my-5"><span>OU</span></div>

                            <div class="row">
                                <div class="col-lg-8 col-11 mx-auto">
                                    <form role="form" method="post">
                                        @csrf
                                        <label for="" style="color: white;">Nom et prénom</label>
                                        <div class="form-floating">
                                            
                                            <input type="text" name="name" id="name"  class="form-control" placeholder="Nom et prénom" required style="border: 1px solid #FF4400;>

                                            <label for="name">Nom et prenom</label>
                                            @error('name')
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                        </div>

                                        <label for="" style="color: white;">Adresse mail</label>
                                        <div class="form-floating">
                                            <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email address" required style="border: 1px solid #FF4400;>

                                            <label for="email">Addresse mail</label>
                                            @error('email')
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                        </div>

                                        <label for="" style="color: white;">Mot de passe</label>
                                        <div class="form-floating">
                                            <input type="password" name="password" id="password"  class="form-control" placeholder="Password" required style="border: 1px solid #FF4400;>

                                            <label for="password">Mot de passe</label>
                                            @error('password')
                                            <div class="text-danger">{{$message}}</div>
                                            @enderror
                                            <!--<p class="text-center">* shall include 0-9 a-z A-Z in 4 to 10 characters</p>-->
                                        </div>

                                        <label for="" style="color: white;">Confirmer le mot de passe</label>
                                        <div class="form-floating">
                                            <input type="password" name="password_confirmation" id="confirm_password" class="form-control" placeholder="Password" required style="border: 1px solid #FF4400;>

                                            <label for="confirm_password">Confirmer le mot de passe</label>
                                        </div>

                                        <button type="submit" class="btn custom-btn form-control mt-4 mb-3" style="background-color: #FF4400;">
                                            Créer le compte
                                        </button>

                                        <p class="text-center" style="color: white;">Avez-vous déjà un compte ?  <a href="{{route('login')}}" style="color: #FF4400;">Connectez-vous</a></p>

                                    </form>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                </div>
            </section>

        </main>

        

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/Headroom.js"></script>
        <script src="js/jQuery.headroom.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/custom.js"></script>

    </body>
</html>
