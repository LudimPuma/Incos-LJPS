<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('css/login.css')}}">
        <style>
            .fondo {
                background-image: url('img/Fondo/p1.jpg');
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }
        </style>
    </head>
    <body class="bg-primary fondo">
        <img src="./img/logo.png" alt="logo_icono" class="logo">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <br><br><br><br><br>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5 contenedor">
                                    {{-- <div class="card-header"><h3 class="text-center font-weight-light my-4">Iniciar Sesión</h3></div> --}}
                                    <div class="card-body">
                                        <form method='POST' action="{{route('iniciar-sesion')}}">
                                            @csrf
                                            @if ($errors->any())
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <strong>Error:</strong> {{ $errors->first('error') }}
                                                </div>
                                            @endif
                                            <div class="d-flex justify-content-center">

                                            </div>
                                            <div class="text-center fs-1 fw-bold titulo">
                                                Iniciar Sesión
                                            </div>
                                            <div class="input-group mt-4">
                                                <div class="input-group-text iconos">
                                                    <img src="./img/username-icon.svg" alt="username_icon" class="username">
                                                </div>
                                                <input type="text" name='email' placeholder="Usuario" class="form-control bg-light">
                                            </div>
                                            <div class="input-group mt-1">
                                                <div class="input-group-text iconos">
                                                    <img src="./img/password-icon.svg" alt="password_icon" class="password">
                                                </div>
                                                <input type="password" name='password' placeholder="Contraseña" class="form-control bg-light">
                                            </div>
                                            <button class="btn text-white w-100 mt-4 shadow-sm" type='submit'>Ingresar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>

    </body>
</html>
