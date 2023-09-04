<aside class="dashboard__sidebar">
    <nav class="dashboard__menu">
        <a href="/admin/dashboard" class="dashboard__link <?php echo currentPage('/dashboard') ? 'dashboard__link--active': ''; ?>">
            <i class="bx bxs-home || dashboard__icon"></i>
            <span class="dashboard__link-text">
                Inicio
            </span>
        </a>

        <a href="/admin/ponentes?page=1" class="dashboard__link <?php echo currentPage('/projects') ? 'dashboard__link--active': ''; ?>">
            <i class="bx bx-folder || dashboard__icon"></i>
            <span class="dashboard__link-text">
                Proyectos
            </span>
        </a>

        <a href="/admin/eventos" class="dashboard__link <?php echo currentPage('/eventos') ? 'dashboard__link--active': ''; ?>">
            <i class="bx bxl-javascript || dashboard__icon"></i>
            <span class="dashboard__link-text">
                Tecnologias
            </span>
        </a>

        <!-- <a href="/auth/logout" class="dashboard__link dashboard__link--logout">
            <span class="dashboard__link-text">
                Cerrar Sesión
            </span>
        </a> -->
    </nav>
</aside>