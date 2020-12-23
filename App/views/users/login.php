<?php require APPROOT . '/views/inc/header.php'?>
<div class="bo">
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body mt-5" style="background-color:black;border-radius:15px;border-color:#282828">
            <h2>login</h2>
            <div>Fill your info to login</div>
            <form action="<?php echo URLROOT; ?>/users/login" method="post">
                <div class="form-group">
                    <label for="email">Email: <sup>*</sup></label>
                    <input type="email" name ="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : '' ;?>" value="<?php echo $data['email']; ?>">
                    <span class="invalid-feedback"><?php echo $data['email_err']?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password: <sup>*</sup></label>
                    <input type="password" name ="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : '' ;?>" value="<?php echo $data['password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['password_err']?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Login" class="btn btn-warning btn-block">
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-dark btn-block"> No account? register</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<?php require APPROOT . '/views/inc/footer.php'?>