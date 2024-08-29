<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" <?php if ($showOrHideMenu) { ?> href="/home" <?php } else { ?> href="/login" <?php } ?>>Tareas</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <div class="d-flex justify-content-end w-100"> <!-- Flexbox para alinear a la derecha -->
      <ul class="navbar-nav">
        <?php if ($showOrHideMenu) { ?>
          <li class="nav-item active">
            <a class="nav-link" href="/home">Tareas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/add">Agregar tarea</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/close">Cerrar sesión</a>
          </li>
        <?php } else { ?>
          <li class="nav-item">
            <a class="nav-link" href="/login">Iniciar sesión</a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>
