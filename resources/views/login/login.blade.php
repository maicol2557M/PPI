<!DOCTYPE html>
<html lang="es">

<head>
  <title>Inicio de sesión</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/material-design-iconic-font@2.2.0/dist/css/material-design-iconic-font.min.css">
  @include('layouts.head')
</head>

<body>
  <div class="login-container full-cover-background">
    <div class="form-container">
      <p class="text-center" style="margin-top: 17px;">
        <i><img src="assets/icons/logo asesoro mediano.webp" style="width:55%;"></i>
      </p>
      <h4 class="text-center all-tittles" style="margin-bottom: 30px;">inicia sesión con tu cuenta</h4>
      <form method="POST" action="{{ route('inicio') }}">
        @csrf
        <div class="group-material-login">
          <input type="text" name="id_cedula" class="material-login-control" required maxlength="70" autofocus>
          <span class="highlight-login"></span>
          <span class="bar-login"></span>
          <label><i class="zmdi zmdi-account"></i> &nbsp; Cédula</label>
        </div><br>
        <div class="group-material-login">
          <input type="password" name="password" class="material-login-control" required maxlength="70">
          <span class="highlight-login"></span>
          <span class="bar-login"></span>
          <label><i class="zmdi zmdi-lock"></i> &nbsp; Contraseña</label>
        </div>
        <button class="btn-login" type="submit">Ingresar al sistema &nbsp; <i class="zmdi zmdi-arrow-right"></i></button>
      </form>
    </div>
  </div>
</body>

</html>
