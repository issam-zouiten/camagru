<?php
    require_once CAMAGRU_ROOT . '/Views/inc/header.php';
    require_once CAMAGRU_ROOT . '/Views/inc/nav.php';
?>

<div class="row w-7">
    <?php foreach($data['posts'] as $post) : ?>
        <div class="card card-body mx-2 mb-4 " style="min-width: 18rem; max-width: 18rem; ">
            <div class="d-flex justify-content-left h-auto mb-3 mx-2">
                <img class="post-user rounded-circle shadow my-auto" src="<?php echo $post->profile_img ?>" alt="profile">
                <h6 class="card-title mx-2 my-auto h-auto"><?php echo $post->username; ?></h6>
            </div>
            <div class=" p-2 mb-3">
                <img class="card-img-top" src="<?php echo $post->content; ?>" alt="<?php echo $post->title; ?>">
            </div>
            <div class="create_date mx-2">
                <p><?php echo $post->create_at; ?></p>
            </div>
        </div>
    <?php endforeach;  ?>
    <div class="text-center">
    <ul class="pagination pagination-lg">
    <?php for($i = 0;$i < $data['countpg']; $i++){ echo '<li class="active"><a href="'. URL_ROOT .'/posts?start='.$i.'">'.$i.'</a> </li>';} ?>
    </ul>
    </div>
</div>
<?php require_once CAMAGRU_ROOT . '/Views/inc/footer.php'; ?>