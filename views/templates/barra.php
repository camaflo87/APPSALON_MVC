<div class="barra">
    <p>Hola: <?php echo $nombre ?? ''; ?></p>

    <a class="boton" href="/public/logout">Cerrar Sesión</a>
</div>


<?php if(isset($_SESSION['admin'])){?>
    <div class="barra-servicios">
        <a href="/public/admin" class="boton">Ver Citas</a>
        <a href="/public/servicios" class="boton">Ver Servicios</a>
        <a href="/public/servicios/crear" class="boton">Nuevo Servicio</a>
    </div>
<?php } ?>