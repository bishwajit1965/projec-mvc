    <div class="col-sm-9 main-content mt-1">
        <div class="page-content-border-top"></div>
        <div class="admin-panel-page-header rounded text-capitalize text-center pt-2">
            <h6>Article index</h6>
        </div>
        <div class="right-content-loader">
            <style>
            .myButton {
                font-size: 12px;
                height: 25px;
            }
            </style>
            <!-- Will display data insertion/insertion error message -->
            <?php
            if (array_key_exists('message', $data) || array_key_exists('error_message', $data)) {
                foreach (isset($data['message']) ? $data['message'] : $data['error_message']  as $key => $value) {
                    echo $value;
                }
            }
            ?>
            <table class="table table-striped table-inverse table-responsive table-sm" style="font-size: 11px;">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Synopsis</th>
                        <th>Content</th>
                        <th>Category</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $helpers = new Helpers();
                    if (array_key_exists('posts', $data)) {
                        $postId =0;
                        foreach ($data['posts'] as $key => $post) {
                            $postId++; ?>
                    <tr>
                        <td width="2%"><?php echo $postId ; ?></>
                        <td width="12%"><?php echo  $helpers->textShorten($post->title, 40); ?></td>
                        <td width="8%"><?php echo $post->author; ?></td>
                        <td width=17%"><?php echo $helpers->textShorten($post->synopsis, 50); ?></td>
                        <td width="17%"><?php echo $helpers->textShorten($post->content, 50); ?></td>
                        <td width="5%">
                            <?php
                            if (array_key_exists('category', $data)) {
                                foreach ($data['category'] as $key => $Category) {
                                    if ($post->category == $Category->id) {
                                        echo $Category->name;
                                    }
                                }
                            } ?>
                        </td>
                        <td width="17%"><?php echo $helpers->dateFormat($post->created_at); ?></td>
                        <td width="17%"><?php echo $helpers->dateFormat($post->updated_at); ?></td>
                        <td width="5%">
                            <a href="" class="btn btn-sm btn-primary mb-1 d-block myButton"><i class="fas fa-edit"></i>
                                Edit</a>
                            <?php
                            if (Session::get('role') == 1) {
                                ?>
                            <a href="" class="btn btn-sm btn-danger d-block myButton"><i class="fas fa-trash"></i>
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