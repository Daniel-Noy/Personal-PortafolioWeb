<main class="admin">
    <div class="container-sm">
        <h1 class="admin__title"><?php echo $title; ?></h1>

        <form method="POST" class="form" enctype="multipart/form-data">
            <?php include_once __DIR__ . '/../../templates/alerts.php' ?>
            <div class="form__field">
                <label for="title" class="form__label">Titulo</label>
                <input 
                type="text"
                name="title"
                id="title"
                class="form__input"
                placeholder="Titulo del proyecto"
                value ="<?php echo $project->title ?? ''; ?>"
                >
            </div>
            <div class="form__field form__field--file">
                <label for="image" class="form__label">Imagen</label>
                <label for="image" class="form__file">Elegir</label>
                <input
                type="file"
                accept="image/*"
                class="form__input form__input--file"
                id="image"
                name="image"
                >
            </div>
            <?php if (isset($speaker->currentImage)) { ?>
                <p class="form__text">Imagen Actual:</p>
                <div class="form__image">
                    <picture>
                        <source type="image/webp" srcset="<?php echo "{$_ENV['HOST']}/img/speakers/{$speaker->currentImage}.webp"; ?>">
                        <source type="image/png" srcset="<?php echo "{$_ENV['HOST']}/img/speakers/{$speaker->currentImage}.png"; ?>">
                        <img src="<?php echo "{$_ENV['HOST']}/img/speakers/{$speaker->currentImage}.png"; ?>" alt="Imagen Ponente">
                    </picture>
                </div>
            <?php } ?>

            <div class="form__field">
                <label for="description" class="form__label">Descripcion</label>
                <textarea
                name="description"
                id="description"
                class="form__textarea"
                rows="10"
                ><?php echo $project->description ?? ''; ?></textarea>
            </div>
            <div class="form__field">
                <label for="repo" class="form__label">Repositorio</label>
                <input 
                type="text"
                name="repo"
                id="repo"
                class="form__input"
                placeholder="Link del repositorio"
                value ="<?php echo $project->repo ?? ''; ?>"
                >
            </div>
            <div class="form__field">
                <label for="page" class="form__label">Página</label>
                <input 
                type="text"
                name="page"
                id="page"
                class="form__input"
                placeholder="Titulo de la página"
                value ="<?php echo $project->page ?? ''; ?>"
                >
            </div>

            <button type="submit" class="form__submit || button button__secondary"><i class='bx bx-plus-circle'></i> Agregar proyecto</button>
        </form>
    </div>
</main>