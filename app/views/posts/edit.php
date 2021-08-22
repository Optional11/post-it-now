<?php require APPROOT . '/views/inc/header.php'; ?>

<a href="<?= URLROOT; ?>/posts" class="btn btn-light"><i class="fa fa-backward pr-1"></i>Back</a>

<div class="card card-body bg-light mt-5">
    <h2>Edit Post</h2>
    <p>Edit your own post</p>

    <form action="<?= URLROOT; ?>/posts/edit/<?= $data['id']; ?>" method="POST">

        <div class="form-group">
            <label for="title">Title: <sup>*</sup></label>
            <input type="text" id="title" name="title" class="form-control form-control-lg <?= (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?= $data['title']; ?>">
            <span class="invalid-feedback"><?= $data['title_err']; ?></span>
        </div>

        <div class="form-group">
            <label for="body">Body: <sup>*</sup></label>
            <textarea id="body" name="body" class="form-control form-control-lg <?= (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>"><?= $data['body']; ?></textarea>
            <span class="invalid-feedback"><?= $data['body_err']; ?></span>
        </div>

        <input type="submit" class="btn btn-success" value="Submit">

    </form>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>