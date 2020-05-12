<div class="col-sm-4 offset-sm-4 py-5">
    <h4 class="bg-secondary pb-2 text-white px-2 mb-3 rounded">Add category</h4>
    <?php
    if (array_key_exists('message', $data) || array_key_exists('error_message', $data)) {
        foreach (isset($data['message']) ? $data['message'] : $data['error_message']  as $key => $value) {
            ?>
    <span class="alert alert-success d-block bg-info"
        style="color:#F0F0F0;font-weight:800;"><?php echo $value; ?></span>
    <?php
        }
    }
    ?>
    <form action="<?php echo BASE_URL;?>?url=categoryController/addCategory" method="post">
        <div class="form-group">
            <input type="text" name="name" class="form-control form-control-sm" placeholder="Category name ..."
                required="1" autocomplete="off">
        </div>
        <div class="form-group">
            <input type="text" name="title" class="form-control form-control-sm" placeholder="Category title ..."
                required="1" autocomplete="off">
        </div>
        <div class="form-group">
            <button type="submit" name="submit" value="submit" class="btn btn-sm btn-primary"><i
                    class="fas fa-upload"></i> Upload</button>
            <a href="index.php?url=homeController/index" class="btn btn-sm btn-warning"><i class="fas fa-home"></i>
                Go home</a>
        </div>
    </form>
</div>