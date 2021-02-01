<?php
require_once CAMAGRU_ROOT . '/Views/inc/header.php';
require_once CAMAGRU_ROOT . '/Views/inc/nav.php';
?>
<div class="text-center">
    <div class="h-auto w-auto">
        <div class="filter ">
            <div class="column my-2 rounded shadow">
                <input class="d-none" type="radio" name="filter" id="fillter1" value="fillter1" onclick="choose_filter()">
                <label for="fillter1"><img src="../public/img/fillter1.png" class="filter_img my-auto"></label>
            </div>
            <div class="column my-2 rounded shadow ">
                <input class="d-none" type="radio" name="filter" id="fillter2" value="fillter2" onclick="choose_filter()">
                <label for="fillter2"><img src="../public/img/fillter2.png" class="filter_img"></label>
            </div>
            <div class="column my-2 rounded shadow">
                <input class="d-none" type="radio" name="filter" id="fillter3" value="fillter3" onclick="choose_filter()">
                <label for="fillter3"><img src="../public/img/fillter3.png" class="filter_img"></label>
            </div>
            <div class="column my-2 rounded shadow">
                <input class="d-none" type="radio" name="filter" id="fillter4" value="fillter4" onclick="choose_filter()">
                <label for="fillter4" class="w-auto h-auto"><img src="../public/img/fillter4.png" class="filter_img"></label>
            </div>
        </div>
        <div class="image-container mx-auto d-flex  flex-row " style="width: 80%;">
            <div class="picture">
                <div class="camera card w-100 h-auto bg-light shadow" id="vi">
                    <video class="w-100 h-100" id="video" autoplay></video>
                </div>
                <div class="image card w-100 my-4 shadow ">
                    <canvas id="pic" class="w-100 h-100"></canvas>
                </div>
            </div>
            <div class="mx-4 shadow respon">
                <?php $i = 0;
                foreach ($data['posts'] as $post) : if ($i++ < 5) :
                        if ($post->userId == $_SESSION['user_id']) : ?>
                            <div class="rounded" id="add-gallery">
                                <div class="">
                                    <img class="rounded shadow my-1 " style="height: 15vh;width:15vh; object-fit:fill;" src="<?php echo $post->content; ?>" alt="<?php echo $post->title; ?>">
                                </div>
                            </div>
                <?php endif;
                    endif;
                endforeach; ?>
            </div>
        </div>
    </div>
    <div class="buttons row  d-flex justify-content-center my-auto mx-auto">
        <input type="button" class="column btn btn-outline-info shadow w-auto h-auto mx-1" value="Take photo" id="take" onclick="enable()" disabled>
        <input type="button" class="column btn btn-outline-success shadow w-auto h-auto mx-1" value="Save photo" id="save" onclick="saveImage()" disabled>
        <input type="button" class="column btn btn-outline-danger shadow w-auto h-auto mx-1" value="Clear photo" id="clear">
        <input type="file" class="column form-control shadow w-auto h-auto mx-1" value="Upload photo" id="upload" accept="image/jpg, image/jpeg, image/png">
    </div>
    <div class="mx-4 shadow respon1">
        <?php $i = 0;
        foreach ($data['posts'] as $post) : if ($i++ < 5) :
                if ($post->userId == $_SESSION['user_id']) : ?>
                    <div class="rounded" id="add-gallery">
                        <div class="">
                            <img class="rounded shadow my-1 " style="height: 15vh;width:15vh; object-fit:fill;" src="<?php echo $post->content; ?>" alt="<?php echo $post->title; ?>">
                        </div>
                    </div>
        <?php endif;
            endif;
        endforeach; ?>
    </div>
</div>


<?php require_once CAMAGRU_ROOT . '/Views/inc/footer.php'; ?>