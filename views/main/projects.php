<section class="main__section" id="projects">
    <div class="main__container projects">
        <h2 class="main__title">Mis proyectos</h2>

        <div class="projects__grid">
            <?php foreach ($projects as $project) { ?>
                <div class="card">
                    <figure>
                        <img src="<?php echo "/img/projects/{$project->image}.webp"?>" alt="Imagen Proyecto" class="card__image">
                    </figure>
                    <div class="card__info">
                        <h4 class="card__title"><?php echo $project->title; ?></h4>
                        <div class="card__description">
                            <p class="card__text"><?php echo s($project->description); ?></p>
                        </div>
                        <div class="card__links">
                        <a class="card__link || button button__primary" href="<?php echo $project->repo?>" target="_blank"><i class='bx bxl-github || card__link-icon' ></i> Ver código</a>
                            <a class="card__link || button button__primary" href="<?php echo $project->page?>" target="_blank"><i class='bx bx-link-external || card__link-icon' > </i>Ver proyecto</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>