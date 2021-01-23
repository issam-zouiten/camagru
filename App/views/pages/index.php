
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
        <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0" style="background-color: #ededed;">
            <div class="img-left card-bodya">
                    <img class="card-img-top" src="<?php echo $post->content; ?>" alt="<?php echo $post->title; ?>">
                </div>
                <div class="card-body h-100 comments1">
                    <h4 class="title text-center mt-4" style="height: 5%;">
                        Comments
                    </h4>
                    <hr style="position:relative;">
                    <div class="comm">
                    <div class="pre-scrollable" >
                        <div class="mt-1 w-75">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-8 w-100 ">
                                    <?php
                                        if(is_array($data['comments']))
                                        {
                                            foreach($data['comments'] as $comment)
                                            {
                                                if($comment->post_id == $post->postId)
                                                {
                                                    ?>
                                                    <div class="card w-75 mt-1 mx-auto" style="border: none;border-radius: 5px; width: 80; ">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="user d-flex flex-row "> <span class="px-2 mx-2" style="height: 15%; margin-left:30%"><p class="text-primary"><i class="fa fa-user"></i><?php echo $comment->username;?></p></span></div>
                                                    </div>
                                                    <span class="px-4 mx-2"><p><?php echo htmlspecialchars($comment->content);?></p></span>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="cardbox-comments mt-2 mt-4 input-group">
                          <textarea name="comment_<?php echo $post->postId;?>" class="form-control w-75" placeholder="write a comment..." rows="1" style="resize:none"></textarea>
                          <button onclick="comment(event)"
                            data-c-user_id="<?php echo $_SESSION['user_id'];?>"
                            data-c-post_id="<?php echo $post->postId;?>" class="nput-group-addon btn btn-dark" style="display:inline">Add</button>
                    </div> 
                </div>
            </div>
            <div class="col-lg-10 col-xl-9 card card1 d-flex flex-row mx-auto px-4 m-3">
              <?php
                $liked = false;
                foreach ($data['likes'] as $like) {
                    if ($like->user_id == $_SESSION['user_id'] && $like->post_id == $post->postId) {
                        $liked = true; ?>
                        <i class = "fa fa-heart" style="font-size:36px;color:rgb(223, 121, 172)"
                           data-post_id="<?php echo $post->postId; ?>" 
                           data-user_id="<?php echo $_SESSION['user_id']; ?>" 
                           data-like_nbr="<?php echo $post->like_nbr;?>" 
                          onclick="like(event)"
                          id="l_<?php echo $post->postId;?>"
                          name="li_<?php echo $post->postId;?>"
                          style="margin-top: 9px;margin-left:9px;">    
                        </i>
                        <?php
                    }
                }
                if ($liked === false) {?>
                    <i class = "fa fa-heart-o" style="font-size:36px;color:rgb(223, 121, 172)"
                      data-post_id="<?php echo $post->postId;?>" 
                      data-like_nbr="<?php echo $post->like_nbr;?>" 
                      data-user_id="<?php echo $_SESSION['user_id'];?>" 
                      onclick="like(event)" id="l_<?php echo $post->postId;?>"
                      name="li_<?php echo $post->postId;?>"
                      style="margin-top: 9px;margin-left:9px;">  
                    </i>
                <?php }
                ?>
                  <strong><p id="li_nb_<?php echo $post->postId;?>" class="my-1 mx-3"><?php echo $post->like_nbr;?> </p></strong>
                  <strong><p class="my-1">Likes</p></strong>
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