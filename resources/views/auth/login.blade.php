<!DOCTYPE html>
<html lang="es">

<head>
    <title>Inicio de sesión</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/material-design-iconic-font@2.2.0/dist/css/material-design-iconic-font.min.css">
    @include('layouts.head')

    <!-- Bootstrap 5 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <style>
        /* MODAL ESTILO SISTEMA */
        .modal-dialog {
            margin: 1.75rem auto;
        }

        .modal-content {
            max-height: 90vh;
            overflow-y: auto;
            border-radius: 10px;
            border: 1px solid #e0e0e0;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
            background: #fff;
        }

        .modal-header {
            background: #5d6dc3;
            color: #fff;
            border-radius: 10px 10px 0 0;
            border-bottom: 1px solid #e0e0e0;
            padding: 16px 24px;
            display: flex;
            align-items: center;
        }

        .modal-title {
            font-size: 20px;
            font-weight: 600;
            margin: 0 auto;
            text-align: center;
            flex: 1;
            letter-spacing: 1px;
        }

        .modal-header .btn-close {
            filter: invert(1);
            opacity: 0.8;
            background: none;
            border: none;
            font-size: 20px;
            margin-left: auto;
        }

        .modal-header .btn-close:hover {
            opacity: 1;
        }

        .modal-body {
            padding: 32px 24px 24px 24px;
            background: #f5f6fa;
        }

        .group-material {
            margin-bottom: 18px;
            position: relative;
        }

        .group-material label {
            font-size: 15px;
            color: #444;
            font-weight: 500;
            margin-bottom: 4px;
            display: block;
            letter-spacing: 0.5px;
        }

        .group-material input {
            width: 100%;
            border: 1px solid #bdbdbd;
            border-radius: 5px;
            padding: 10px 36px 10px 12px;
            font-size: 15px;
            background: #fff;
            color: #333;
            transition: border-color 0.2s;
        }

        .group-material input:focus {
            border-color: #5d6dc3;
            outline: none;
            background: #f0f4ff;
        }

        .group-material .modal-password-toggle {
            position: absolute;
            right: 12px;
            top: 38px;
            cursor: pointer;
            color: #888;
            font-size: 18px;
            z-index: 2;
            transition: color 0.2s;
        }

        .group-material .modal-password-toggle:hover {
            color: #5d6dc3;
        }

        .modal-body .alert {
            border-radius: 6px;
            border: none;
            margin-bottom: 18px;
            padding: 12px 18px;
            font-size: 14px;
        }

        .modal-body .alert-success {
            background: #eafaf1;
            color: #218838;
            border-left: 4px solid #28a745;
        }

        .modal-body .alert-danger {
            background: #fbeaea;
            color: #c82333;
            border-left: 4px solid #dc3545;
        }

        .modal-footer {
            border-top: none;
            padding: 0 24px 24px 24px;
            display: flex;
            justify-content: center;
            gap: 12px;
        }

        .btn-raised {
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.10);
            border-radius: 6px;
            font-weight: 500;
            padding: 10px 28px;
            font-size: 15px;
            letter-spacing: 0.5px;
            transition: box-shadow 0.2s, background 0.2s;
        }

        .btn-success {
            background: #28a745;
            color: #fff;
            border: none;
        }

        .btn-success:hover {
            background: #218838;
        }

        .btn-default {
            background: #6c757d;
            color: #fff;
            border: none;
        }

        .btn-default:hover {
            background: #495057;
            color: #fff;
        }

        @media (max-width: 768px) {
            .modal-dialog {
                max-width: 98vw;
                margin: 0.5rem auto;
            }

            .modal-content {
                max-height: 98vh;
            }

            .modal-body {
                padding: 18px 8px 12px 8px;
            }

            .modal-header {
                padding: 10px 10px;
            }

            .modal-title {
                font-size: 17px;
            }

            .btn-raised {
                padding: 8px 16px;
                font-size: 13px;
            }
        }

        /* Quitar fondo rojo de los modales solo en esta vista */
        .modal {
            background: transparent !important;
            box-shadow: none !important;
        }

        .input-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
            font-size: 18px;
            z-index: 2;
        }

        .password-eye {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
            font-size: 18px;
            z-index: 2;
            cursor: pointer;
            transition: color 0.2s;
        }

        .password-eye:hover {
            color: #5d6dc3;
        }

        .group-material input.material-control {
            padding-left: 38px;
        }

        .group-material input[type="password"].material-control,
        .group-material input[type="text"].material-control.password-field {
            padding-right: 38px;
        }
    </style>
</head>

<body>
    <div class="login-container full-cover-background">
        <div class="form-container">
            <p class="text-center" style="margin-top: 17px;">
                <i><img src="assets/icons/logo asesoro mediano.webp" style="width:55%;"></i>
            </p>
            <h4 class="text-center all-tittles" style="margin-bottom: 30px;">inicia sesión con tu cuenta</h4>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login.post') }}" id="loginForm">
                @csrf
                <div class="group-material-login">
                    <input type="text" name="id_cedula"
                        class="material-login-control @error('id_cedula') is-invalid @enderror" required maxlength="70"
                        autofocus value="{{ old('id_cedula') }}">
                    <span class="highlight-login"></span>
                    <span class="bar-login"></span>
                    <label><i class="zmdi zmdi-account"></i> &nbsp; Cédula</label>
                </div><br>
                <div class="group-material-login" style="position: relative;">
                    <input type="password" name="password" id="password"
                        class="material-login-control @error('password') is-invalid @enderror" required maxlength="70">
                    <span class="highlight-login"></span>
                    <span class="bar-login"></span>
                    <label><i class="zmdi zmdi-lock"></i> &nbsp; Contraseña</label>
                    <i class="zmdi zmdi-eye password-toggle" onclick="togglePassword()"></i>
                </div>
                <div class="text-center" style="margin-top: 30px;">
                    <button class="btn btn-success btn-raised btn-md" type="submit">
                        <i class="zmdi zmdi-sign-in"></i> &nbsp; Ingresar al Sistema
                    </button>
                </div>
            </form>

            <p class="text-center" style="margin-top: 20px;">
                ¿No tienes cuenta? <a href="#" onclick="openRegisterModal()"
                    style="color: #667eea; text-decoration: none; font-weight: bold;">Regístrate aquí</a>
            </p>
        </div>
    </div>

    <!-- Modal de Registro -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center all-tittles" id="registerModalLabel">
                        <i class="zmdi zmdi-account-add"></i> &nbsp; Registro de Usuario
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="registerSuccess" class="alert alert-success" style="display: none;"></div>
                    <div id="registerErrors" class="alert alert-danger" style="display: none;"></div>

                    <form id="registerForm" method="POST" action="{{ route('register.post') }}">
                        @csrf
                        <div class="group-material" style="position: relative;">
                            <i class="zmdi zmdi-account input-icon"></i>
                            <input type="text" name="id_cedula" id="modalCedula" class="material-control" required
                                maxlength="70" placeholder="Cédula" style="padding-left: 38px;">
                        </div>
                        <div class="group-material" style="position: relative;">
                            <i class="zmdi zmdi-account-circle input-icon"></i>
                            <input type="text" name="nombre" id="modalNombre" class="material-control" required
                                maxlength="70" placeholder="Nombre Completo" style="padding-left: 38px;">
                        </div>
                        <div class="group-material" style="position: relative;">
                            <i class="zmdi zmdi-email input-icon"></i>
                            <input type="email" name="correo_electronico" id="modalCorreo"
                                class="material-control" maxlength="70" placeholder="Correo Electrónico (Opcional)"
                                style="padding-left: 38px;">
                        </div>
                        <div class="group-material" style="position: relative;">
                            <i class="zmdi zmdi-lock input-icon"></i>
                            <input type="password" name="password" id="modalPassword"
                                class="material-control password-field" required maxlength="70"
                                placeholder="Contraseña">
                            <i class="zmdi zmdi-eye password-eye" onclick="toggleModalPassword()"></i>
                        </div>
                        <div class="group-material" style="position: relative;">
                            <i class="zmdi zmdi-lock-outline input-icon"></i>
                            <input type="password" name="password_confirmation" id="modalPasswordConfirm"
                                class="material-control password-field" required maxlength="70"
                                placeholder="Confirmar Contraseña">
                            <i class="zmdi zmdi-eye password-eye" onclick="toggleModalPasswordConfirm()"></i>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success btn-raised">
                                <i class="zmdi zmdi-account-add"></i> &nbsp; Registrarse
                            </button>
                            <button type="button" class="btn btn-default btn-raised" data-bs-dismiss="modal">
                                <i class="zmdi zmdi-close"></i> &nbsp; Cancelar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Función para alternar visibilidad de contraseña
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.querySelector('.password-toggle');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('zmdi-eye');
                toggleIcon.classList.add('zmdi-eye-off');
                toggleIcon.style.color = '#667eea';
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('zmdi-eye-off');
                toggleIcon.classList.add('zmdi-eye');
                toggleIcon.style.color = '#666';
            }
        }

        // Función para alternar visibilidad de contraseña en el modal
        function toggleModalPassword() {
            const passwordInput = document.getElementById('modalPassword');
            const toggleIcon = document.querySelector('.password-eye');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('zmdi-eye');
                toggleIcon.classList.add('zmdi-eye-off');
                toggleIcon.style.color = '#667eea';
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('zmdi-eye-off');
                toggleIcon.classList.add('zmdi-eye');
                toggleIcon.style.color = '#666';
            }
        }

        // Función para alternar visibilidad de confirmación de contraseña en el modal
        function toggleModalPasswordConfirm() {
            const passwordInput = document.getElementById('modalPasswordConfirm');
            const toggleIcon = document.querySelectorAll('.password-eye')[1];

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('zmdi-eye');
                toggleIcon.classList.add('zmdi-eye-off');
                toggleIcon.style.color = '#667eea';
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('zmdi-eye-off');
                toggleIcon.classList.add('zmdi-eye');
                toggleIcon.style.color = '#666';
            }
        }

        // Función para abrir el modal de registro
        function openRegisterModal() {
            const modal = new bootstrap.Modal(document.getElementById('registerModal'));
            modal.show();
            // Limpiar formulario y mensajes
            document.getElementById('registerForm').reset();
            document.getElementById('registerSuccess').style.display = 'none';
            document.getElementById('registerErrors').style.display = 'none';
        }

        // Validación de login
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const cedula = document.querySelector('input[name="id_cedula"]').value;
            const password = document.querySelector('input[name="password"]').value;

            if (!cedula || !password) {
                e.preventDefault();
                alert('Por favor completa todos los campos');
                return false;
            }

            if (cedula.length < 8) {
                e.preventDefault();
                alert('La cédula debe tener al menos 8 dígitos');
                return false;
            }

            if (password.length < 6) {
                e.preventDefault();
                alert('La contraseña debe tener al menos 6 caracteres');
                return false;
            }
        });

        // Prevenir múltiples envíos en login
        let loginFormSubmitted = false;
        document.getElementById('loginForm').addEventListener('submit', function() {
            if (loginFormSubmitted) {
                event.preventDefault();
                return false;
            }
            loginFormSubmitted = true;
            this.querySelector('button[type="submit"]').disabled = true;
        });

        // Manejo del formulario de registro con AJAX
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const submitButton = this.querySelector('button[type="submit"]');
            const originalText = submitButton.innerHTML;

            // Deshabilitar botón y mostrar loading
            submitButton.disabled = true;
            submitButton.innerHTML = '<i class="zmdi zmdi-spinner zmdi-hc-spin"></i> &nbsp; Registrando...';

            // Ocultar mensajes anteriores
            document.getElementById('registerSuccess').style.display = 'none';
            document.getElementById('registerErrors').style.display = 'none';

            fetch('{{ route('register.post') }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Registro exitoso
                        document.getElementById('registerSuccess').innerHTML = data.message;
                        document.getElementById('registerSuccess').style.display = 'block';
                        setTimeout(() => {
                            const modal = bootstrap.Modal.getInstance(document.getElementById(
                                'registerModal'));
                            modal.hide();
                            window.location.href = '/inicio';
                        }, 2000);
                    } else {
                        // Mostrar errores
                        let errorHtml = '<ul class="mb-0">';
                        if (data.errors) {
                            Object.values(data.errors).forEach(error => {
                                errorHtml += '<li>' + error[0] + '</li>';
                            });
                        } else {
                            errorHtml += '<li>' + (data.message || 'Error en el registro') + '</li>';
                        }
                        errorHtml += '</ul>';
                        document.getElementById('registerErrors').innerHTML = errorHtml;
                        document.getElementById('registerErrors').style.display = 'block';
                    }
                })
                .catch(error => {
                    document.getElementById('registerErrors').innerHTML =
                        '<ul class="mb-0"><li>Error de conexión. Intenta de nuevo.</li></ul>';
                    document.getElementById('registerErrors').style.display = 'block';
                })
                .finally(() => {
                    // Restaurar botón
                    submitButton.disabled = false;
                    submitButton.innerHTML = originalText;
                });
        });

        // Validación del formulario de registro
        document.getElementById('registerForm').addEventListener('input', function() {
            const cedula = this.querySelector('input[name="id_cedula"]').value;
            const nombre = this.querySelector('input[name="nombre"]').value;
            const password = this.querySelector('input[name="password"]').value;
            const passwordConfirmation = this.querySelector('input[name="password_confirmation"]').value;
            const email = this.querySelector('input[name="correo_electronico"]').value;

            const submitButton = this.querySelector('button[type="submit"]');

            // Validar campos obligatorios
            if (cedula && nombre && password && passwordConfirmation) {
                // Validar cédula
                if (cedula.length < 8) {
                    submitButton.disabled = true;
                    return;
                }

                // Validar nombre
                if (nombre.length < 3) {
                    submitButton.disabled = true;
                    return;
                }

                // Validar contraseña
                if (password.length < 6) {
                    submitButton.disabled = true;
                    return;
                }

                // Validar confirmación de contraseña
                if (password !== passwordConfirmation) {
                    submitButton.disabled = true;
                    return;
                }

                // Validar email si se proporciona
                if (email && !email.includes('@')) {
                    submitButton.disabled = true;
                    return;
                }

                submitButton.disabled = false;
            } else {
                submitButton.disabled = true;
            }
        });
    </script>
</body>

</html>
