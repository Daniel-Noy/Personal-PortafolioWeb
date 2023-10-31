<div class="admin">
    <div class="container-sm">
        <h1 class="dashboard__title"><?php echo $title; ?></h1>

        <div class="dashboard__button-container">
            <a class="dashboard__button || button button__secondary" href="/admin/technologies">
                <i class='bx bxs-left-arrow-circle'></i>
                Regresar
            </a>
            
            <form method="POST" action="/admin/technologies/delete">
                <input type="hidden" name="id" value="<?php echo $tool->id?>">
                <button type="submit" class="dashboard__button || button button__primary">
                    <i class='bx bxs-x-circle'></i>
                    Eliminar Tecnología
                </button>
            </form>
        </div>

        <form method="POST" class="form" enctype="multipart/form-data">
            <?php include_once __DIR__ . '/../../templates/alerts.php' ?>
            <?php include_once __DIR__ . '/form.php' ?>

            <button type="submit" class="form__submit || button button__secondary"><i class='bx bx-plus-circle'></i> Actualizar proyecto</button>
        </form>
    </div>
</div>