<section class="presentation" id="presentation">
    <div class="presentation__grid">
        <div class="presentation__content">
            <h1 class="presentation__title">
                Hola, soy <span class="text__gradient">Daniel</span> y soy <span class="text__gradient">Desarrollador Web</span>
            </h1>
            <p class="presentation__text">Bienvenido a mi portafolio, aquí podras encontrar algunos de mis primeros proyectos en este genial y emocionante mundo web.</p>
        </div>

        <div class="presentation__image">
            <img src="/img/avatar/Avatar.png" alt="">
        </div>
    </div>
</section>

<div class="grid">
    <main class="main">
        <section class="main__section">
            <div class="main__container about-me">
                <h2 class="main__title">Sobre Mi</h2>
                <picture>
                    <img class="about-me__image" src="/img/icons/icon.svg" alt="">
                </picture>
                <div class="about-me__content">
                    <p class="about-me__text">Soy una persona curiosa, responsable, en constante aprendizaje, buscando conocer nuevos entornos y personas, ayudando a cumplir las metas que se asignen con los conocimientos que he adquirido.</p>
                    <a href="/files/CV-DanielNoyola2.0.pdf" target="_blank" class="button button__secondary">Ver curriculum</a>
                </div>
            </div>
        </section>

        <?php include_once __DIR__ . '/skills.php'; ?>
        <?php include_once __DIR__ . '/projects.php'; ?>

        <section class="main__section">
            <div class="main__container contact">
                <h2 class="main__title">Contacto</h2>

                <div class="contact__grid" id="contact-form">
                    <?php include_once __DIR__ . '/contact-cards.php'; ?>
                    <?php include_once __DIR__ . '/form.php'; ?>
                </div>
            </div>
        </section>

    </main>
    <div class="scroll"></div>
</div>