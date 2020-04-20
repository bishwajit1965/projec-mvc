<div class="form-data py-2">
    <h2>Contact page</h2>
    <form action="index.php?url=views/home/process.php" method="post">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" id="" class="form-control" placeholder="Name..." aria-describedby="helpId">
            <small id="helpId" class="text-muted">Help text</small>
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" name="email" id="" class="form-control" placeholder="Email..." aria-describedby="helpId">
            <small id="helpId" class="text-muted">Help text</small>
        </div>
        <div class="input-group">
            <span class="input-group-btn">
                <button class="btn btn-primary" type="button" aria-label="">Action</button>
            </span>
            <input type="text" class="form-control" name="address" id="address" placeholder="Address ..."
                aria-label="kjhkjhk">
        </div>
        <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>

</div>