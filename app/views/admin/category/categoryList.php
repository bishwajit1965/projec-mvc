    <div class="col-sm-9 main-content mt-1">
        <div class="page-content-border-top"></div>
        <div class="admin-panel-page-header rounded text-capitalize text-center pt-2">
            <h6>Category list</h6>
        </div>
        <?php
        if (array_key_exists('message', $data) || array_key_exists('error_message', $data)) {
            foreach (isset($data['message']) ? $data['message'] : $data['error_message']  as $key => $value) {
                ?>

        <?php echo $value; ?>
        <?php
            }
        }
        ?>
        <div class="right-content-loader">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Category title</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
            if (array_key_exists('category', $data)) {
                $categoryNo =  0;
                foreach ($data['category'] as $key => $Category) {
                    $categoryNo++; ?>
                    <tr>
                        <td scope="row">
                            <?php echo $categoryNo ; ?>
                        </td>
                        <td>
                            <?php echo $Category->name; ?>
                        </td>
                        <td>
                            <?php echo $Category->title; ?>
                        </td>
                        <td>
                            <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo "<p style='color:#bb0000; font-weight:800;'> No data is available !!! </p>";
            }
            ?>
                </tbody>
            </table>
            <a href="<?php echo BASE_URL;?>?url=AdminController/home" class="btn btn-sm btn-primary mb-2"><i
                    class="fas fa-home"></i> Go home</a>
        </div>

    </div>
    </div><!-- /Main content area ends here -->