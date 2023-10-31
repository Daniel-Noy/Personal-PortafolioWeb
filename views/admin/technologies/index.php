<h2 class="dashboard__title"><?php echo $title ?></h2>

<div class="dashboard__button-container container">
<a class="dashboard__button || button button__secondary" href="/admin/technologies/add">
    <i class='bx bx-folder-plus'></i>
    Añadir Tecnología
</a>
</div>

<div class="dashboard__container || container">
    <div class="table table__tech">
        <div class="table__head">
            <div class="table__col">Id</div>
            <div class="table__col">Nombre</div>
            <div class="table__col">Categoria</div>
            <div class="table__col">Image</div>   
        </div>
        <div class="table__body">
        <?php if ($tools) { 
            foreach ($tools as $tool) { 
                ?>
                <a href="<?php echo "technologies/edit?id={$tool->id}";?>" class="table__row" title="Actualizar">
                    <div class="table__col table__id"><p><?php echo $tool->id; ?></p></div>
                    <div class="table__col table__title"><p><?php echo $tool->name; ?></p></div>
                    <div class="table__col table__description"><p><?php echo $tool->category; ?></p></div>
                    <div class="table__col table__icon"><img src="<?php echo "/img/icons/{$tool->icon}.svg"; ?>" alt="Imagen proyecto"></div>
                </a>
        <?php }} ?>
        </div>
    </div>
</div>