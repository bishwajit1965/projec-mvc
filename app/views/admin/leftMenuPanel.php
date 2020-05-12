<!-- Main content area begins -->
<div class="row">
    <div class="col-sm-3 main-content-sidebar mt-1">
        <div class="page-content-border-top alert-info"></div>
        <div class="sidebar-menu-heading rounded pt-2">
            <h6>Admin Option</h6>
            <ul>
                <li><a href="<?php echo BASE_URL;?>?url=AdminController/home"><i class="fas fa-home"></i> Admin home</a>
                </li>
                <li id="log-out"><a href="<?php echo BASE_URL;?>?url=LoginController/logout" id="log-out"><i
                            class="fas fa-sign-out-alt" id="log-out"></i>
                        Admin log out</a></li>
            </ul>
        </div>
        <div class="sidebar-menu-heading rounded pt-2">
            <h6>Category option </h6>
            <ul>
                <li><a href="<?php echo BASE_URL;?>?url=CategoryController/store"><i class="fas fa-plus"></i> Add
                        category</a></li>
                <li><a href="<?php echo BASE_URL;?>?url=CategoryController/category"><i class="fas fa-list"></i>
                        Category list</a></li>
            </ul>
        </div>
        <div class="sidebar-menu-heading rounded pt-2">
            <h6>Article option</h6>
            <ul>
                <li><a href="<?php echo BASE_URL;?>?url=PostController/create"><i class="fas fa-plus"></i> Add
                        article</a></li>
                <li><a href="<?php echo BASE_URL;?>?url=PostController"><i class="fas fa-list"></i> Article
                        list</a></li>
            </ul>
        </div>
    </div>