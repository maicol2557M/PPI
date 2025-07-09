<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro de usuarios</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="Shortcut Icon" type="image/x-icon" href="assets/icons/book.ico" />
    @include('layouts.head')
</head>

<body>
    @include('layouts.header')
    <div class="content-page-container full-reset custom-scroll-containers">
        @include('layouts.nav')
        <div class="container">
            <div class="page-header">
                <h1 class="all-tittles">Registro de Usuario<small></small></h1>
            </div>
        </div>
        <div class="container-fluid" style="margin: 50px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <img src="{{ asset('assets/img/user01.png') }}" alt="user" class="img-responsive center-box"
                        style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                    Bienvenido a la sección para registrar un nuevo usuario en el sistema, debes de
                    llenar todos los campos del siguiente formulario para registrar un nuevo usuario.
                </div>
            </div>
        </div>
        <hr>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-8">
                    <form method="POST" action="{{ route('register.post') }}" id="registerForm">
                        @csrf
                        
                        <div class="group-material">
                            <input type="text" name="id_cedula" class="material-control @error('id_cedula') is-invalid @enderror" required maxlength="70" value="{{ old('id_cedula') }}">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label><i class="zmdi zmdi-account"></i> &nbsp; Cédula</label>
                        </div>

                        <div class="group-material">
                            <input type="text" name="nombre" class="material-control @error('nombre') is-invalid @enderror" required maxlength="70" value="{{ old('nombre') }}">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label><i class="zmdi zmdi-account-circle"></i> &nbsp; Nombre Completo</label>
                        </div>

                        <div class="group-material">
                            <input type="email" name="correo_electronico" class="material-control @error('correo_electronico') is-invalid @enderror" maxlength="70" value="{{ old('correo_electronico') }}">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label><i class="zmdi zmdi-email"></i> &nbsp; Correo Electrónico</label>
                        </div>

                        <div class="group-material">
                            <input type="password" name="password" class="material-control @error('password') is-invalid @enderror" required maxlength="70">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label><i class="zmdi zmdi-lock"></i> &nbsp; Contraseña</label>
                        </div>

                        <div class="group-material">
                            <input type="password" name="password_confirmation" class="material-control @error('password_confirmation') is-invalid @enderror" required maxlength="70">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label><i class="zmdi zmdi-lock-outline"></i> &nbsp; Confirmar Contraseña</label>
                        </div>

                        <p class="text-center">
                            <button type="submit" class="btn btn-success btn-raised btn-md">
                                <i class="zmdi zmdi-account-add"></i> &nbsp; Registrarse
                            </button>
                        </p>
                    </form>

                    <p class="text-center">
                        ¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión aquí</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center all-tittles">ayuda del sistema</h4>
                    </div>
                    <div class="modal-body">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore dignissimos qui molestias
                        ipsum officiis unde aliquid consequatur, accusamus delectus asperiores sunt. Quibusdam veniam
                        ipsa accusamus error. Animi mollitia corporis iusto.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i
                                class="zmdi zmdi-thumb-up"></i> &nbsp; De acuerdo</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
    @include('layouts.script')

    <script>
        // Validación de formulario en JavaScript
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            const cedula = document.querySelector('input[name="id_cedula"]').value;
            const nombre = document.querySelector('input[name="nombre"]').value;
            const email = document.querySelector('input[name="correo_electronico"]').value;
            const password = document.querySelector('input[name="password"]').value;
            const passwordConfirmation = document.querySelector('input[name="password_confirmation"]').value;
            
            if (!cedula || !nombre || !password || !passwordConfirmation) {
                e.preventDefault();
                alert('Por favor completa todos los campos obligatorios');
                return false;
            }
            
            if (cedula.length < 8) {
                e.preventDefault();
                alert('La cédula debe tener al menos 8 dígitos');
                return false;
            }
            
            if (nombre.length < 3) {
                e.preventDefault();
                alert('El nombre debe tener al menos 3 caracteres');
                return false;
            }
            
            if (email && !email.includes('@')) {
                e.preventDefault();
                alert('Por favor ingresa un correo electrónico válido');
                return false;
            }
            
            if (password.length < 6) {
                e.preventDefault();
                alert('La contraseña debe tener al menos 6 caracteres');
                return false;
            }
            
            if (password !== passwordConfirmation) {
                e.preventDefault();
                alert('Las contraseñas no coinciden');
                return false;
            }
        });

        // Prevenir múltiples envíos
        let formSubmitted = false;
        document.getElementById('registerForm').addEventListener('submit', function() {
            if (formSubmitted) {
                event.preventDefault();
                return false;
            }
            formSubmitted = true;
            this.querySelector('button[type="submit"]').disabled = true;
        });
    </script>
</body>

</html> 