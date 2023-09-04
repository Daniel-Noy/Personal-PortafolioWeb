<section class="presentation">
    <div class="presentation__grid">
        <div class="presentation__content">
            <h1 class="presentation__title">
                Hola, soy <span class="text__gradient">Daniel</span> y soy <span class="text__gradient">Desarrollador Web</span>
            </h1>
            <p class="presentation__text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate, nobis nostrum. Accusantium dolor officiis expedita iure atque harum tempore ratione.</p>
        </div>

        <div class="presentation__image">
            <img src="https://picsum.photos/id/5/400/300" alt="">
        </div>
    </div>
</section>

<div class="grid">
    <main class="main">
        <section class="main__section">
            <div class="main__container about-me">
                <h2 class="main__title">Sobre Mi</h2>
                <picture>
                    <source srcset="https://picsum.photos/id/20/500/350">
                    <img src="https://picsum.photos/id/20/500/350" alt="Mi imagen">
                </picture>
                <p class="about-me__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis impedit aliquam aperiam veniam vel optio culpa, quo, debitis dolorem repellat, est atque nihil numquam alias soluta! Odio laboriosam earum officiis!</p>
            </div>
        </section>

        <?php include_once __DIR__ . '/skills.php'; ?>
        <?php include_once __DIR__ . '/projects.php'; ?>

        <section class="main__section">
            <div class="main__container contact">
                <h2 class="main__title">Contacto</h2>

                <div class="contact__grid">

                    <?php include_once __DIR__ . '/contact-cards.php'; ?>
                    <?php include_once __DIR__ . '/form.php'; ?>
                </div>
            </div>
        </section>

    </main>
    <div class="scroll"></div>
</div>