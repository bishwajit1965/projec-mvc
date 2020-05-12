<!-- Main content area begins -->
<div class="row">
    <div class="col-sm-9 pb-2">
        <div class="page-content-border-top"></div>
        <div class="page-header rounded text-capitalize text-center pt-2">
            <h2>Articles home page</h2>
        </div>
        <?php
         if (array_key_exists('posts', $data)) {
             foreach ($data['posts'] as $key => $post) {
                 ?>
        <div class="post">
            <a href="<?php echo BASE_URL; ?>?url=PostController/postInDetail/<?php echo $post->id; ?>">
                <h2><?php echo $post->title; ?>
                </h2>
            </a>
            <div class="post-detail">
                <p>
                    <span><strong id="particular">Author:</strong><?php echo $post->author; ?>
                    </span> || <span><strong id="particular">Published
                            on:</strong><?php
                            $date = $post->created_at;
                 echo date('F j, Y, g:i a', strtotime($date)); ?></span> ||
                    <span><strong id="particular">Category:</strong><span class="badge badge-pill badge-primary">
                            <?php
                            if (array_key_exists('category', $data)) {
                                foreach ($data['category'] as $key => $Category) {
                                    ?>
                            <a href="<?php echo BASE_URL; ?>?url=PostController/postInDetail/<?php echo $post->id; ?>">
                                <?php
                                    if ($post->category == $Category->id) {
                                        ?>
                                <span style="color:#F0F0F0;"><?php   echo $Category->name; ?></span>
                                <?php
                                    } ?>
                            </a>
                            <?php
                                }
                            } ?>
                        </span>
                    </span>
                </p>
            </div>
            <div style="text-align:justify;">
                <?php
                $postContent = $post->content;
                 $limit = 450;
                 $postContent = $postContent . " ";
                 $postContent = substr($postContent, 0, $limit);
                 $postContent = substr($postContent, 0, strrpos($postContent, ' '));
                 $postContent = $postContent . ".....";
                 echo $postContent; ?>
            </div>
            <span class="d-flex justify-content-end">
                <a href="<?php echo BASE_URL; ?>?url=PostController/postInDetail/<?php echo $post->id; ?>"
                    class="btn btn-sm btn-primary "><i class="fas fa-book"></i> Read More</a>
            </span>
        </div>
        <?php
             }
         }
        ?>
    </div>
    <div class="col-sm-3 ">
        <div class="sidebar">
            <h2>Catagories</h2>
            <ul>
                <?php
                if (array_key_exists('category', $data)) {
                    foreach ($data['category'] as $key => $Category) {
                        ?>
                <li><a
                        href="<?php echo BASE_URL; ?>?url=PostController/categoryWisePosts/<?php echo $Category->id; ?>"><?php echo $Category->name; ?></a>
                </li>
                <?php
                    }
                }
                ?>
            </ul>
        </div>
        <div class="recent-posts">
            <h2>Recent posts</h2>
            <ul>
                <?php
                if (array_key_exists('recentPosts', $data)) {
                    foreach ($data['recentPosts'] as $key => $post) {
                        ?>
                <li><a href="<?php echo BASE_URL; ?>?url=PostController/postInDetail/<?php echo $post->id; ?>"><?php echo $post->title; ?>
                    </a></li>
                <?php
                    }
                }
                ?>
            </ul>
        </div>
    </div>
    <!-- </div> -->