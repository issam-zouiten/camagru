<?php
    require_once CAMAGRU_ROOT . '/Views/inc/header.php';
    require_once CAMAGRU_ROOT . '/Views/inc/nav.php';
?>

    <?php foreach($data['posts'] as $post) : ?>
        <div class="d-flex justify-content-left w-100 m-auto border rounded-top ">
            <img class="rounded-circle mx-2 mt-auto" src="<?php echo $post->profile_img ?>" alt="profile">
            <h6 class="card-title mx-3 mt-auto"><?php echo $post->username; ?></h6>
        </div>
        <div class="row px-3 mt-4 mb-4">
            <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
                <div class="img-left card-bodya">
                    <img class="card-img-top " src="<?php echo $post->content; ?>" alt="<?php echo $post->title; ?>">
                </div>
                <div class="card-body ">
                    <h4 class="title text-center mt-4">
                        Comment
                    </h4>
                    <hr style="position:relative;">
                    <div class="d-none d-md-flex">
                        <div class="mt-1 w-100">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-8 w-100">
                                    <div class="card p-4 w-100" style="border: none; box-shadow: 5px 6px 6px 2px #e9ecef; border-radius: 4px">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="user d-flex flex-row "> <img src="<?php echo $post->profile_img ?>"  class="user-img rounded-circle " style="width:20px;height:20px;"> <span class="px-2"><p class=" text-primary ml-1"><?php echo $post->username; ?></p> <p class="font-weight-bold mt-1 ">Hmm, This poster looks cool</p></span> </div> <small class="create_date">2 days ago</small>
                                        </div>   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
    
