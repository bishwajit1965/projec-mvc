    <div class="col-sm-9 main-content mt-1">
        <div class="page-content-border-top"></div>
        <div class="admin-panel-page-header rounded text-capitalize text-center pt-2">
            <h6>Add Category</h6>
        </div>
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
        <div class="row">
            <div class="col-sm-6 offset-sm-3 py-5">
                <div class="right-content-loader">
                    <form action="<?php echo BASE_URL;?>?url=categoryController/addCategory" method="post">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control form-control-sm"
                                placeholder="Category name ..." required="1" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="text" name="title" class="form-control form-control-sm"
                                placeholder="Category title ..." required="1" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" value="submit" class="btn btn-sm btn-primary"><i
                                    class="fas fa-upload"></i> Upload category</button>
                            <a href="<?php echo BASE_URL;?>?url=AdminController/home" class="btn btn-sm btn-warning"><i
                                    class="fas fa-home"></i> Go home</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div><!-- /Main content area ends here -->