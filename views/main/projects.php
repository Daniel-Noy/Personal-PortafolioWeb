<section class="main__section">
    <div class="main__container projects">
        <h2 class="main__title">Mis proyectos</h2>

        <div class="projects__grid">
            <?php foreach ($projects as $project) { ?>
                <div class="card || floating">
                    <figure>
                        <img src="<?php echo "/img/{$project->image}.webp"?>" alt="Imagen Proyecto" class="card__image">
                    </figure>
                    <div class="card__info">
                        <h4 class="card__title"><?php echo $project->title; ?></h4>
                        <p class="card__description"><?php echo $project->description; ?></p>
                        <div class="card__links">
                        <a class="card__link || button button__primary" href="<?php echo $project->repo?>" target="_blank"><i class='bx bxl-github || card__link-icon' ></i> Ver proyecto</a>
                            <a class="card__link || button button__primary" href="<?php echo $project->page?>" target="_blank"><i class='bx bx-link-external || card__link-icon' > </i>Ver código</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php for($i = 0; $i < 4; $i++) { ?>
                <div class="card || floating">
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