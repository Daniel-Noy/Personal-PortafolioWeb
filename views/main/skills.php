<section class="main__section">
    <div class="main__container skills">
        <h2 class="main__title">Habilidades</h2>
        <div class="skills__categories">
            <?php foreach($categories as $category) {?>
                <div class="skills__category">
                    <h3 class="skills__title"><?php echo $category->name; ?></h3>
                    <div class="skills__container || container-sm">
                        <?php foreach($tools[$category->id] as $tool) {?>
                            <div class="skills__skill">
                                <img class="skills__image" src="/img/icons/<?php echo $tool->icon?>.svg" alt="<?php echo $tool->name;?>">
                                <p class="skills__name"><?php echo $tool->name; ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
            <!-- <div class="skills__category">
                <h3 class="skills__title">Categoria 1</h3>
                <div class="skills__container || container-sm">
                <i class='bx bxl-html5'></i>
                <i class='bx bxl-css3' ></i>
                <i class='bx bxl-javascript' ></i>
                </div>
            </div>
            <div class="skills__category">
                <h3 class="skills__title">Categoria 2</h3>
                <div class="skills__container || container-sm">
                <i class='bx bxl-php'></i>
                <i class='bx bxs-data' ></i>
                </div>
            </div>
            <div class="skills__category">
                <h3 class="skills__title">Categoria 3</h3>
                <div class="skills__container || container-sm">
                <i class='bx bxl-git'></i>
                <i class='bx bxl-github' ></i>
                </div>
            </div>
            <div class="skills__category">
                <h3 class="skills__title">Categoria 4</h3>
                <div class="skills__container || container-sm">
                <i class='bx bxl-visual-studio'></i>
                <i class='bx bxl-github' ></i>
                </div>
            </div> -->
        </div>
    </div>
</section>