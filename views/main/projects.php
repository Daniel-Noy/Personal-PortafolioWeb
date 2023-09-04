<section class="main__section">
    <div class="main__container projects">
        <h2 class="main__title">Mis proyectos</h2>

        <div class="projects__grid">
            <?php foreach ($projects as $project) { ?>
            <?php for($i = 0; $i < 6; $i++) { ?>
                <div class="card">
                    <figure>
                        <img src="<?php echo "/img/{$project->image}.webp"?>" alt="Imagen Proyecto" class="card__image">
                    </figure>
                    <div class="card__info">
                        <h4 class="card__title"><?php echo $project->title; ?></h4>
                        <p class="card__description"><?php echo $project->description; ?></p>
                        <div class="card__links">
                        <a class="card__link || button button__primary" href="<?php echo $project->repo?>" target="_blank"><i class='bx bxl-github || card__link-icon' ></i> Ver código</a>
                            <a class="card__link || button button__primary" href="<?php echo $project->page?>" target="_blank"><i class='bx bx-link-external || card__link-icon' > </i>Ver proyecto</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php } ?>
        </div>
    </div>
</section>