<?php require APPROOT . '/views/inc/header.php'; ?>

<a href="<?= URLROOT; ?>/posts" class="btn btn-light"><i class="fa fa-backward pr-1"></i>Back</a>
<br>
<h1><?= $data['post']->title; ?></h1>
<div class="bg-secondary text-white p-2 mb-3">
    Written by <?= $data['post']->name; ?> on <?= $data['post']->postCreated; ?>
</div>
<p><?= $data['post']->body; ?></p>

<?php if ($data['post']->userId == $_SESSION['user_id']) : ?>
    <hr>
    <a href="<?= URLROOT; ?>/posts/edit/<?= $data['post']->postId ?>" class="btn btn-dark">Edit</a>

    <form class="float-right" action="<?= URLROOT; ?>/posts/delete/<?= $data['post']->postId ?>" method="POST">
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>
<?php endif; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>