<div class="row links">
    <div class="col-sm-12 home-index py-2" style="background-color:#E4E4E4;">
        <a href="http://localhost/project-mvc/public/index.php?url=HomeController/home"
            class="btn btn-sm btn-primary"><i class="fas fa-home"></i> Home page</a>
        <a href="index.php?url=ContactController/contactUs" class="btn btn-sm btn-primary"><i
                class="fas fa-envelope"></i>
            Contact Us</a>
        <a href="http://localhost/project-mvc/public/index.php?url=CategoryController/category"
            class="btn btn-sm btn-primary"><i class="fas fa-eye"></i>
            View category</a>
        <a href="http://localhost/project-mvc/public/index.php?url=CategoryController/store"
            class="btn btn-sm btn-primary"><i class="fas fa-eye"></i>
            Add category</a>
        <a href="http://localhost/project-mvc/public/index.php?url=PostController/posts"
            class="btn btn-sm btn-primary"><i class="fas fa-list"></i> Article home</a>
        <?php
            if (Session::get('login')==true) {
                ?>
        <a href="http://localhost/project-mvc/public/index.php?url=LoginController/logout"
            class="btn btn-sm btn-danger"><i class="fas fa-sign-out-alt"></i> Log out</a>
        <?php
            } else {
                ?>
        <a href="http://localhost/project-mvc/public/index.php?url=LoginController/"
            class="btn btn-sm btn-primary"><i class="fas fa-sign-in-alt"></i> Log in</a>
        <?php
            }
            ?>




    </div>
</div>