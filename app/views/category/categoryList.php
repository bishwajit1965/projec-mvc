<div class="col-sm-6 offset-sm-3 category-list">
    <h2>Category list</h2>
    <?php
    if (array_key_exists('message', $data) || array_key_exists('error_message', $data)) {
        foreach (isset($data['message']) ? $data['message'] : $data['error_message']  as $key => $value) {
            ?>

    <?php echo $value; ?>
    <?php
        }
    }
    ?>
    <table class="table table-sm table-responsive">
        <thead>
            <tr>
                <th>#</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (array_key_exists('category', $data)) {
                foreach ($data['category'] as $key => $Category) {
                    ?>
            <tr>
                <td scope="row">
                    <?php echo $Category->id ; ?>
                </td>
                <td>
                    <div>
                        <?php echo $Category->name; ?>
                    </div>
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
    <a href="index.php?url=homeController/index" class="btn btn-sm btn-primary mb-2"><i class="fas fa-home"></i> Go
        home</a>
</div>