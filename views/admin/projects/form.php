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
<?php if (isset($project->image)) { ?>
    <p class="form__text">Imagen Actual:</p>
    <div class="form__image">
        <picture>
            <img src="<?php echo "{$_ENV['HOST']}/img/{$project->image}.webp"; ?>" alt="Imagen Ponente">
        </picture>
    </div>
<?php } ?>

<div class="form__field">
    <label for="description" class="form__label">Descripción</label>
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
