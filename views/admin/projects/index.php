<h2 class="dashboard__heading"><?php echo $title ?></h2>

<div class="dashboard__button-container">
    <a class="dashboard__button || button button__secondary" href="/admin/projects/add">
        <i class='bx bx-folder-plus'></i>
        Añadir Ponente
    </a>
</div>

<div class="dashboard__container || container">
    <div class="table">
        <div class="table__head">
            <div class="table__col">Id</div>
            <div class="table__col">Titulo</div>
            <div class="table__col">Descripción</div>
            <div class="table__col">Image</div>   
        </div>
        <div class="table__body">
        <?php if ($projects) { 
            foreach ($projects as $project) { 
                ?>
                <a href="<?php echo "projects/edit?id={$project->id}";?>" class="table__row">
                    <div class="table__col table__id"><p><?php echo $project->id; ?></p></div>
                    <div class="table__col table__title"><p><?php echo $project->title; ?></p></div>
                    <div class="table__col table__description"><p><?php echo $project->description; ?></p></div>
                    <div class="table__col table__image"><img src="<?php echo "/img/{$project->image}.webp"; ?>" alt="Imagen proyecto"></div>
                </a>
        <?php }} ?>
        <?php echo $pager ?>
        </div>
    </div>
</div>