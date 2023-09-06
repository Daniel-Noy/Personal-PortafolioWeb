<div class="admin">
    <div class="container-sm">
        <h1 class="dashboard__title"><?php echo $title; ?></h1>

        <div class="dashboard__button-container">
            <a class="dashboard__button || button button__secondary" href="/admin/projects">
            <i class='bx bxs-left-arrow-circle'></i>
                Regresar
            </a>
        </div>

        <form method="POST" class="form" enctype="multipart/form-data">
            <?php include_once __DIR__ . '/../../templates/alerts.php' ?>
            <?php include_once __DIR__ . '/form.php' ?>

            <button type="submit" class="form__submit || button button__secondary"><i class='bx bx-plus-circle'></i> Agregar proyecto</button>
        </form>
    </div>
</div>