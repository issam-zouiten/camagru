<?php require_once CAMAGRU_ROOT . '/Views/inc/header.php'; 
    if (isLogged()){
        redirect('posts');
        exit();
    }
?>
        <div class="d-flex align-items-center min-vh-100 py-3 py-md-0">
            <div class="col-lg-10 col-xl-9 card login-card flex-row m-auto mx-auto px-0" style="background-color: #eee;">
                <div class=" my-auto card-bodya text-center h-100 hidd">
                    <h1><a class="text-dark" href="<?php echo URL_ROOT ?>" style="font-family: Billabong; font-size: 70px; text-decoration:none;">Camagru</a></h1>
                </div>
                <div class="card-body my-auto">
                    <?php pop_up('signup_ok'); ?>
                    <?php pop_up('not_verified'); ?>
                    <p class="text-center"><strong>Sign in</strong></p>
                    <form action="<?php echo URL_ROOT; ?>/users/login" method="post">
                        <div class="form-group mb-3 w-75 m-auto">
                            <input type="text" name="username" class="form-control form-control-lg 
                                <?php echo (!empty($data['err_username'])) ? 'is-invalid' : ''; ?>" placeholder="username" value="<?php echo $data['username']; ?>">
                            <span class="invalid-feedback"><?php echo $data['err_username'] ?></span>
                        </div>
                        <div class="form-group mb-3 w-75 m-auto">
                            <input type="password" name="password" class="form-control form-control-lg 
                                <?php echo (!empty($data['err_password'])) ? 'is-invalid' : ''; ?>" placeholder="password" value="<?php echo $data['password']; ?>">
                            <span class="invalid-feedback"><?php echo $data['err_password'] ?></span>
                        </div>
                        <div class="row mb-4 w-75 ml-5 m-auto">
                            <input type="submit" value="Log in" class="btn btn-primary btn-block">
                        </div>
                        <div class="row text-center">
                            <p>Forgot you password ? <a href="<?php echo URL_ROOT ?>/users/forgot" style="text-decoration: none;">reset password</a></p>
                            <p>You don't have an account? <a href="<?php echo URL_ROOT ?>/users/signup" style="text-decoration: none;">sign up</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<?php require_once CAMAGRU_ROOT . '/Views/inc/footer.php'; ?>