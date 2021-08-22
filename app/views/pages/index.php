<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
        <h1 class="display-3"><?= $data['title'] ?></h1>
        <p class="lead"><?= $data['description'] ?></p>
    </div>
</div>


<!-- sample how to read data from controller
<ul>
    <?php foreach ($data['posts'] as $post) : ?>
        <li><?php echo $post->title; ?></li>
    <?php endforeach; ?>
    
</ul> -->

<?php require APPROOT . '/views/inc/footer.php'; ?>