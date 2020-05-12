<div class="col-sm-3 main-content-sidebar">
    <div class="page-content-border-top no-gutters"></div>
    <div class="sidebar pt-2">
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
</div><!-- /Main content area ends here -->