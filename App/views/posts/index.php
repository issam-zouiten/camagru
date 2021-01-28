<?php
require_once CAMAGRU_ROOT . '/Views/inc/header.php';
require_once CAMAGRU_ROOT . '/Views/inc/nav.php';
?>

<?php foreach ($data['posts'] as $post) : ?>
    <div class="col-lg-10 col-xl-9 card card1 d-flex flex-row mx-auto px-0">
        <img class="rounded-circle mx-2 mt-auto" src="<?php echo $post->profile_img ?>" alt="profile">
        <h6 class="card-title text-white mx-3 mt-auto"><?php echo $post->username; ?></h6>
    </div>
    <div class="px-3 mt-4 mb-4">
        <div class="post card mx-auto px-0 resp">
            <div class="img-left card-bodya my-auto">
                <img class="post-imgs shadow card-img-top" style="object-fit:fill;" src="<?php echo $post->content; ?>" alt="<?php echo $post->title; ?>">
            </div>
            <div class="card-body comments1">
                <h4 class="title text-center">
                    Comments
                    <hr style="position:relative;" class="mt-3">
                </h4>
                <div class="comm">
                    <div class="pre-scrollable">
                        <div class="mt-1 mx-auto w-75">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-8 w-100 ">
                                    <?php
                                    if (is_array($data['comments'])) {
                                        foreach ($data['comments'] as $comment) {
                                            if ($comment->post_id == $post->postId) {
                                    ?>
                                                <div class="card w-100 mt-1 mx-auto" style="border: none;border-radius: 5px; width: 80; ">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="user d-flex flex-row "> <span class="px-2 mx-2" style="height: 15%; margin-left:30%">
                                                                <p class="text-primary"><i class="fa fa-user"></i><?php echo $comment->username; ?></p>
                                                            </span></div>
                                                    </div>
                                                    <span class="px-4 mx-2">
                                                        <p><?php echo htmlspecialchars($comment->content); ?></p>
                                                    </span>
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
                <div class="cardbox-comments mb-auto mt-2 mt-4 input-group">
                    <input type="text" name="comment_<?php echo $post->postId; ?>" class="form-control w-50" placeholder="write a comment..." rows="1" style="resize:none; border:none"></textarea>
                    <i class="fa fa-paper-plane pt-1" data-c-user_id="<?php echo $_SESSION['user_id']; ?>" data-c-post_id="<?php echo $post->postId; ?>" onclick="comment(event)" style="font-size:27px;background-color: white;color:blue; ">
                    </i>
                </div>
            </div>
        </div>
        <div class="col-lg-10 col-xl-9 card card1 d-flex flex-row mx-auto px-4 m-3">
            <?php
            $liked = false;
            foreach ($data['likes'] as $like) {
                if ($like->user_id == $_SESSION['user_id'] && $like->post_id == $post->postId) {
                    $liked = true; ?>
                    <i class="fa fa-heart" data-post_id="<?php echo $post->postId; ?>" data-user_id="<?php echo $_SESSION['user_id']; ?>" data-like_nbr="<?php echo $post->like_nbr; ?>" onclick="like(event)" id="l_<?php echo $post->postId; ?>" name="li_<?php echo $post->postId; ?>" style="margin-right: 1rem!important;font-size:36px;color:rgb(223, 121, 172)">
                    </i>
                <?php
                }
            }
            if ($liked === false) { ?>
                <i class="fa fa-heart-o" data-post_id="<?php echo $post->postId; ?>" data-like_nbr="<?php echo $post->like_nbr; ?>" data-user_id="<?php echo $_SESSION['user_id']; ?>" onclick="like(event)" id="l_<?php echo $post->postId; ?>" name="li_<?php echo $post->postId; ?>" style="margin-right: 1rem!important;font-size:36px;color:rgb(223, 121, 172)">
                </i>
            <?php }
            ?>
            <strong>
                <p id="li_nb_<?php echo $post->postId; ?>" class="my-1 mx-1 text-white"><?php echo $post->like_nbr; ?> </p>
            </strong>
            <strong>
                <p class="my-1 text-white">Likes</p>
            </strong>
        </div>
    </div>
<?php endforeach;  ?>
<div class="text-center">
    <ul class="pagination ">
        <?php
        if (($data['currentPage'] - 1) > 0)
            echo '<li class="active"><a class="page-link" href="' . URL_ROOT . '/posts?page=' . ($data['currentPage'] - 1) . '"><</a></li>';
        else
            echo '<li class="active"><a class="page-link"><</a></li>';

        for ($i = 1; $i <= $data['totalPages']; $i++) {
            if ($i == $data['currentPage'])
                echo '<li class="active"><a class="page-link">' . $i . '</a></li>';
            else
                echo '<li class="active"><a class="page-link" href="' . URL_ROOT . '/posts?page=' . $i . '">' . $i . '</a></li>';
        }
        if (($data['currentPage'] + 1) <= $data['totalPages'])
            echo '<li class="active"><a class="page-link" href="' . URL_ROOT . '/posts?page=' . ($data['currentPage'] + 1) . '">></a></li>';
        else
            echo '<li class="active""><a class="page-link">></a></li>';

        ?>
    </ul>
</div>
</div>
<?php require_once CAMAGRU_ROOT . '/Views/inc/footer.php'; ?>