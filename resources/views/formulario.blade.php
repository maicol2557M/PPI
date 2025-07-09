<!DOCTYPE html>
<html>
<head>
    <title>Formulario de prueba</title>
</head>
<body>
    <h2>Formulario para probar conexión a la base de datos</h2>
    <form action="/form" method="POST">
        @csrf
        <label>Nombre:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Contraseña:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Guardar usuario</button>
    </form>
</body>
</html>
