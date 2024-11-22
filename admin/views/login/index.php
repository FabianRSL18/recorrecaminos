<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content text-light">
        <div class="modal-header">
            <h5 class="modal-title text-center" id="loginModalLabel">Iniciar Sesión</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="login.php?accion=login" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="data[correo]" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="data[contrasena]" required>
            </div>
            <div class="d-flex justify-content-between mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="form2Example31" checked />
                        <label class="form-check-label" for="form2Example31"> Recuérdame </label>
                    </div>
                    <a class="text-decoration-none" href="login.php?accion=forgot">Recuperar contraseña</a>
            </div>
            <button type="submit" value="entrar al sistema" name="enviar" class="btn btn-primary w-100">Iniciar Sesión</button>
            </form>
            <div class="text-center">
                <p>¿No tienes cuenta?<a class="text-decoration-none ms-2" href="usuario.php?accion=crear">Registrate</a></p>
            </div>
        </div>
        </div>
    </div>
</div>