<?php
    require_once CAMAGRU_ROOT . '/Views/inc/header.php';
    require_once CAMAGRU_ROOT . '/Views/inc/nav.php';
?>
    <?php foreach($data['posts'] as $post) : ?>
        <div class="col-lg-10 col-xl-9 card card1 d-flex flex-row mx-auto px-0">
            <img class="rounded-circle mx-2 mt-auto" src="<?php echo $post->profile_img ?>" alt="profile">
            <h6 class="card-title mx-3 mt-auto"><?php echo $post->username; ?></h6>
        </div>
        <div class="row px-3 mt-4 mb-4">
            <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0" style="max-width:400px">
                <div class="img-left card-bodya" style="width:100%">
                    <img class="card-img-top" src="<?php echo $post->content; ?>" alt="<?php echo $post->title; ?>">
                </div>  
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