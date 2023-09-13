<header class="header || pd-50">
    <div class="header__grid || container">
    <h1 class="header__logo">Daniel Noyola</h1>

    <nav class="header__nav">
        <ul class="header__links">
            <li><a href="#presentation" class="header__link">Inicio</a></li>
            <li><a href="#projects" class="header__link">Proyectos</a></li>
            <li><a href="#contact-form" class="header__link">Contacto</a></li>
            <?php if(isAdmin()) { ?>
            <li><a href="/admin/dashboard" class="header__link">Gestionar</a></li>
            <?php } ?>
        </ul>
    </nav>
    </div>
</header>