<?php
    require_once CAMAGRU_ROOT . '/Views/inc/header.php';
    require_once CAMAGRU_ROOT . '/Views/inc/nav.php';
?>
    <div class=" text-center" id="cam">
        <div class=" d-flex flex-row h-auto ">
            <div class="camera card h-auto bg-light  shadow" id="vi">
                <video class="w-100 h-100" id="video" autoplay></video>
            </div>
            <div class="image card h-auto bg-light shadow ">
                <canvas id="pic" class="w-50 h-50"></canvas>
            </div>
        </div>
        <div class="options my-4 row w-100 h-auto">
            <div class="filter row">
                <div class="column rounded shadow mx-1">
                    <input class="d-none" type="radio" name="filter" id="fillter1" value="fillter1" onclick="choose_filter()">
		  			<label for="fillter1"><img src="../public/img/fillter1.png" class="filter_img my-auto"></label>
                </div>
                <div class="column rounder shadow ">
                    <input class="d-none" type="radio" name="filter" id="fillter2" value="fillter2" onclick="choose_filter()">
                    <label for="fillter2"><img src="../public/img/fillter2.png" class="filter_img"></label>
                </div>
                <div class="column rounded shadow mx-1">
                    <input class="d-none" type="radio" name="filter" id="fillter3" value="fillter3" onclick="choose_filter()">
		  			<label for="fillter3"><img src="../public/img/fillter3.png" class="filter_img"></label>
                </div>
                <div class="column rounded shadow">
                    <input class="d-none" type="radio" name="filter" id="fillter4" value="fillter4" onclick="choose_filter()">
		  			<label for="fillter4" class="w-auto h-auto"><img src="../public/img/fillter4.png" class="filter_img"></label>
                </div>
            </div>
            <div class="buttons row  d-flex justify-content-center my-auto">
                <input type="button" class="column btn btn-outline-info shadow w-auto h-auto mx-1" value="Take photo" id="take" disabled>
                <input type="button" class="column btn btn-outline-success shadow w-auto h-auto mx-1" value="Save photo" id="save" onclick="saveImage()">
                <input type="button" class="column btn btn-outline-danger shadow w-auto h-auto mx-1" value="Clear photo" id="clear">
                <input type="file" class="column form-control shadow w-auto h-auto mx-1" value="Upload photo" id="upload" accept="image/jpg, image/jpeg, image/png">
            </div>
        </div>
    </div>
    <div class="card card-body shadow p-3 bg-white  rounded text-center" id="thum">
    </div>

<?php require_once CAMAGRU_ROOT . '/Views/inc/footer.php'; ?>