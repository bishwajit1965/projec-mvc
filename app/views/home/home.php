<div class="col-sm-12 main-content">
    <?php
    if (array_key_exists('message', $data)) {
        foreach ($data['message']  as $key => $value) {
            echo $value;
        }
    }
    ?>
    <h2>Dashboard</h2>
</div>