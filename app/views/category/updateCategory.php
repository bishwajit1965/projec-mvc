<!-- <div class="update-category">
    <div class="row"> -->
<div class="col-sm-4 offset-sm-4">
    <h4 class="bg-secondary pb-2 text-white mt-5 px-2 mb-3 rounded">Update category</h4>
    <?php
            if (array_key_exists('message', $data) || array_key_exists('error_message', $data)) {
                foreach (isset($data['message']) ? $data['message'] : $data['error_message']  as $key => $value) {
                    ?>
    <?php echo $value; ?>
    <?php
                }
            }
            ?>
    <form action="http://localhost/project-mvc/public/index.php?url=categoryController/updateCategory" method="post">
        <?php
                 if (array_key_exists('categoryById', $data)) {
                     foreach ($data['categoryById'] as $key => $category) {
                         ?>
        <div class="form-group">
            <input type="text" name="name" class="form-control form-control-sm"
                value="<?php echo isset($category->name) ? $category->name : '' ; ?>" required="1">
        </div>
        <div class="form-group">
            <input type="text" name="title" class="form-control form-control-sm"
                value="<?php echo isset($category->title) ? $category->title : '' ; ?>" required="1">
        </div>
        <div class="form-group">
            <button type="submit" name="submit" value="submit" class="btn btn-sm btn-primary"><i
                    class="fas fa-upload"></i> Update category</button>
            <a href="index.php?url=homeController/index" class="btn btn-sm btn-warning"><i class="fas fa-home"></i> Go
                home</a>
        </div>
        <?php
                     }
                 }
                ?>
    </form>
</div>
<!-- </div>
</div> -->