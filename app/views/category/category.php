<div class="category-list">
    <h2>Category list</h2>
    <hr>

    <?php

    foreach ($data as $CatData) {
        ?>
    <div>
        <?php echo $CatData->cat_name; ?>
    </div>
    <?php
    }
    ?>
    <a href="index.php?url=homeController/index" class="btn btn-sm btn-primary mt-5"><i class="fas fa-home"></i> Go
        home</a>

</div>