<!-- Main content area begins -->
<div class="row">
    <div class="col-sm-9 main-content">
        <div class="page-header rounded text-capitalize text-center text-white pt-2">
            <h2>Article in detail</h2>
        </div>
        <?php
        if (array_key_exists('details', $data)) {
            foreach ($data['details'] as $key => $post) {
                ?>
        <div class="post">
            <a href="<?php echo BASE_URL; ?>?url=PostController/categoryWisePosts/<?php echo $post->category; ?>">
                <h2><?php echo $post->title; ?></h2>
            </a>
            <div class="post-detail">
                <p>
                    <span><strong id="particular">Author:</strong> <?php echo $post->author; ?> </span> || <span><strong
                            id="particular">Published on:</strong>
                        <?php
                            $date = $post->created_at;
                echo date('F j, Y, g:i a', strtotime($date)); ?>
                    </span> ||
                    <a
                        href="<?php echo BASE_URL; ?>?url=PostController/categoryWisePosts/<?php echo $post->category; ?>">
                        <span><strong id="particular">Category: </strong><span class="badge badge-pill badge-primary">
                                <?php echo $post->name; ?></span></span>
                    </a>
                </p>
            </div>
            <div style="text-align:justify;">
                <?php echo $post->content; ?>
            </div>
            <span class="d-flex justify-content-end">
                <a href="<?php echo BASE_URL; ?>?url=PostController/posts" class="btn btn-sm btn-primary mb-3"><i
                        class="fas fa-home"></i>
                    Go home</a>
            </span>
        </div>

        <?php
            }
        }
        ?>
    </div>