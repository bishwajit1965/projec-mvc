<div class="row">
    <div class="col-sm-4 offset-sm-4 py-5">
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
        <form action="<?php echo BASE_URL;?>?url=LoginController/loginAuthentication" method="post"
            class="login-form rounded">
            <h4 class="bg-secondary pb-2 text-white px-2 mb-3 rounded">Log in</h4>
            <div class="form-group">
                <input type="text" name="userName" class="form-control form-control-sm"
                    placeholder="Input user name ..." required="1" autocomplete="off">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control form-control-sm"
                    placeholder="Input password ..." required="1" autocomplete="off">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" value="submit" class="btn btn-sm btn-primary"><i
                        class="fas fa-sign-in-alt"></i> Log in</button>
                <a href="index.php?url=homeController/index" class="btn btn-sm btn-warning"><i class="fas fa-home"></i>
                    Go home</a>
            </div>
        </form>
    </div>
</div>