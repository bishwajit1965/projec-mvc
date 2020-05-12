<div class="row">
    <div class="col-sm-6 d-flex justify-content-between py-1">
        <a href="" class="social-links-button"><i class="fab fa-facebook"></i></a>
        <a href="" class="social-links-button"><i class="fab fa-twitter"></i></a>
        <a href="" class="social-links-button"><i class="fab fa-linkedin"></i></a>
        <a href="" class="social-links-button"><i class="fab fa-github"></i></a>
        <a href="" class="social-links-button"><i class="fab fa-stack-overflow"></i></a>
    </div>
    <div class="col-sm-6 search d-flex justify-content-end py-1">
        <form action="<?php echo BASE_URL; ?>?url=PostController/search" method="post" class="form-inline">
            <div class="form-group">
                <input type="text" name="keyWord" id="keyWord" class="form-control form-control-sm mr-sm-2"
                    placeholder="Search input ...">
            </div>
            <div class="form-group">
                <select class="form-control form-control-sm mr-sm-2" name="categoryKey" id="category">
                    <option value="">Search Category</option>
                    <?php
                    if (array_key_exists('search', $data)) {
                        foreach ($data['search'] as $key => $category) {
                            ?>
                    <option value="<?php echo $category->id; ?>">
                        <?php echo $category->name; ?></option>
                    <?php
                        }
                    }?>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-sm btn-info"><i class="fa fa-search"
                    aria-hidden="true"></i>
                Search</button>
        </form>
    </div>
</div>