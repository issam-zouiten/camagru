<?php require_once CAMAGRU_ROOT . '/Views/inc/header.php'; ?>

<div class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="col-lg-10 col-xl-9 card login-card flex-row m-auto mx-auto px-0" style="background-color: #eee;">
        <div class=" my-auto card-bodya text-center h-100 w-50">
            <h1><a class="text-dark" href="<?php echo URL_ROOT ?>" style="font-family: Billabong; font-size: 70px; text-decoration:none;">Camagru</a></h1>
        </div>
        <div class="card-body">
            <?php pop_up('signup_ok'); ?>
            <?php pop_up('not_verified'); ?>
            <p class="text-center"><strong>Enter yout new password</strong></p>
            <form action="<?php echo URL_ROOT; ?>/users/updatepass/<?php echo $data['id'] ?>" method="post">
                <div class="form-group mb-3 w-75 m-auto">
                    <input type="password" name="newPassword" class="form-control form-control-lg 
                        <?php echo (!empty($data['err_newPassword'])) ? 'is-invalid' : ''; ?>" placeholder="New password" value="<?php echo $data['newpassword']; ?>">
                    <span class="invalid-feedback"><?php echo $data['err_newPassword'] ?></span>
                </div>
                <div class="row mb-4 w-75 ml-5 m-auto text-center">
                    <input type="submit" value="Reset" class="btn btn-primary btn-block">
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once CAMAGRU_ROOT . '/Views/inc/footer.php'; ?>