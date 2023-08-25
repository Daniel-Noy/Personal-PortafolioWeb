<section class="main__section">
    <div class="main__container projects">
        <h2 class="main__title">Mis proyectos</h2>

        <div class="projects__grid">
            <?php for($i = 0; $i < 8; $i++) { ?>
                <div class="card">
                    <picture>
                        <img class="card__image" src="https://picsum.photos/id/1/500/350" alt="Imagen Proyecto">
                    </picture>
                    <div class="card__info">
                        <h4 class="card__title">Titulo del proyecto</h4>
                        <p class="card__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore cupiditate commodi, rerum in repellendus aperiam incidunt earum minus qui amet.</p>
                        <div class="card__links">
                            <a class="card__link || button button__primary" href="" target="_blank"><i class='bx bxl-github || card__link-icon' ></i> Ver proyecto</a>
                            <a class="card__link || button button__primary" href="" target="_blank"><i class='bx bx-link-external || card__link-icon' > </i>Ver código</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>