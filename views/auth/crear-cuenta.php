
<h1 class="nombre-pagina">Crear Cuenta</h1>
<p class="descripcion-pagina">Llena el siguiente formulario, para crear una cuenta.</p>

<?php
    include_once __DIR__ . "/../templates/alertas.php";
?>

<form class="formulario" action="/public/crear-cuenta" method="POST">
    <div class="campo">
        <label for="nombre">Nombre:</label>
        <input type="text" placeholder="Tu nombre" id="nombre" name="nombre" value="<?php echo s($usuario->nombre); ?>">
    </div>

    <div class="campo">
        <label for="apellido">Apellido:</label>
        <input type="text" placeholder="Tu apellido" id="apellido" name="apellido" value="<?php echo s($usuario->apellido); ?>">
    </div>

    <div class="campo">
        <label for="telefono">Teléfono:</label>
        <input type="tel" placeholder="Tu teléfono" id="telefono" name="telefono" value="<?php echo s($usuario->telefono); ?>">
    </div>

    <div class="campo">
        <label for="email">Email:</label>
        <input type="email" placeholder="Tu E-mail" id="email" name="email" value="<?php echo s($usuario->email); ?>">
    </div>

    <div class="campo">
        <label for="password">Password:</label>
        <input type="password" placeholder="Tu password" id="password" name="password">
    </div>

    <input type="submit" value="Crear Cuenta" class="boton">
</form>

<div class="acciones">
    <a href="/public/">¿Ya tienes una cuenta? Inicia Sesión</a>
    <a href="/public/olvide">¿Olvidaste tu password?</a>
</div>