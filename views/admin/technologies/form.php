<div class="form__field">
    <label for="name" class="form__label">Nombre</label>
    <input 
    type="text"
    name="name"
    id="name"
    class="form__input"
    placeholder="Nombre de la tecnología"
    value="<?php echo $tool->name ?? ''; ?>"
    >
</div>
<div class="form__field form__field--file">
    <label for="icon" class="form__label">Icono</label>
    <label for="icon" class="form__file">Elegir</label>
    <input
    type="file"
    accept=".svg"
    class="form__input form__input--file"
    id="icon"
    name="icon"
    >
</div>
<?php if (!empty($tool->icon)) { ?>
    <div class="form__image">
        <p class="form__text">Icono Actual:</p>
        <picture>
            <img src="<?php echo "{$_ENV['HOST']}img/icons/{$tool->icon}.svg"; ?>" alt="Icono Actual">
        </picture>
    </div>
<?php } ?>

<div class="form__field">
    <label for="category" class="form__label">Categoria</label>
    <select
    name="category"
    id="category"
    class="form__input"
    >
    <option value="" disabled selected> -- Elige una categoria -- </option>
    <?php foreach ($categories as $category) { ?>
        <option 
            <?php echo $tool->category_id === $category->id? 'selected' : '' ?>
            value="<?php echo $category->id; ?>"
        > <?php echo $category->name; ?>
        </option>
    <?php } ?>
    </select>
</div>
