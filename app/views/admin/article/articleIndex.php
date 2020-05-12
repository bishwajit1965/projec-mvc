    <div class="col-sm-9 main-content mt-1">
        <div class="page-content-border-top"></div>
        <div class="admin-panel-page-header rounded text-capitalize text-center pt-2">
            <h6>Article index</h6>
        </div>
        <div class="right-content-loader">
            <!-- Will display data insertion/insertion error message -->
            <?php
            if (array_key_exists('message', $data) || array_key_exists('error_message', $data)) {
                foreach (isset($data['message']) ? $data['message'] : $data['error_message']  as $key => $value) {
                    echo $value;
                }
            }
            ?>
            <table class="table table-striped table-inverse table-responsive table-sm display" id="myTable"
                data-page-length='5' style="font-size: 11px;">
                <thead class="thead-dark">
                    <tr>
                        <th width="2%">#</th>
                        <th width="12%">Title</th>
                        <th width="8%">Author</th>
                        <th width=17%">Synopsis</th>
                        <th width="17%">Content</th>
                        <th width="5%">Category</th>
                        <th width="17%">Created</th>
                        <th width="17%">Updated</th>
                        <th width="5%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $helpers = new Helpers();
                    if (array_key_exists('posts', $data)) {
                        $postId = 0;
                        foreach ($data['posts'] as $key => $post) {
                            $postId++; ?>
                    <tr>
                        <td><?php echo $postId ; ?></>
                        <td><?php echo  $helpers->textShorten($post->title, 40); ?></td>
                        <td><?php echo $post->author; ?></td>
                        <td><?php echo $helpers->textShorten($post->synopsis, 50); ?></td>
                        <td><?php echo $helpers->textShorten($post->content, 50); ?></td>
                        <td>
                            <?php
                            if (array_key_exists('category', $data)) {
                                foreach ($data['category'] as $key => $Category) {
                                    if ($post->category == $Category->id) {
                                        echo $Category->name;
                                    }
                                }
                            } ?>
                        </td>
                        <td><?php echo $helpers->dateFormat($post->created_at); ?></td>
                        <td><?php echo $helpers->dateFormat($post->updated_at); ?></td>
                        <td>
                            <a href="<?php echo BASE_URL ; ?>?url=PostController/edit/<?php echo $post->id; ?>"
                                class="btn btn-sm btn-primary mb-1 d-block myButton"><i class="fas fa-edit"></i>
                                Edit</a>
                            <?php
                            if (Session::get('role') == 1) {
                                ?>
                            <a href="<?php echo BASE_URL ; ?>?url=PostController/destroy/<?php echo $post->id; ?>"
                                class="btn btn-sm btn-danger d-block myButton"><i class="fas fa-trash"></i>
                                Delete</a>
                            <?php
                            } ?>
                        </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    </div><!-- /Main content area ends here -->