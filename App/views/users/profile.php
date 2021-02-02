<?php
require_once CAMAGRU_ROOT . '/Views/inc/header.php';
require_once CAMAGRU_ROOT . '/Views/inc/nav.php';
if (isset($_SESSION['user_id'])) :
?>
  <?php pop_up('updated'); ?>
  <div class="main-content">
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(https://images.pexels.com/photos/1005324/literature-book-open-pages-1005324.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
    </div>
    <!-- Page content -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0 mt--7">
          <div class="card card2 card-profile shadow" style="overflow:visible">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="<?php echo URL_ROOT ?>/users/profile">
                    <img src="<?php echo $_SESSION['user_img'] ?>" class="rounded-circlez" alt="profile">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
            </div>
            <div class="pt-4 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5"></div>
                </div>
              </div>
              <div class="text-center pt-4 text-white">
                <h3><?php echo ucfirst($_SESSION['user_fullname']) ?></h3>
                <div class="h5 font-weight-300 ">
                  <p class="small mb-4"><?php echo $_SESSION['user_username'] ?></p>
                </div>
                <hr class="my-4">
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1 mt7 p-3">
          <div class="card bg-light shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
                <div class="col-4 text-right ">
                  <input class="btn btn-outline-dark btn-sm" id="edit_profile" onclick="editShow()" value="Edit profile">
                  <input type="button" class="cancel-btn btn btn-outline-danger h-auto shadow" id="cancel" value="cancel" onclick="editHide()"></button>
                </div>
              </div>
            </div>
            <div class="card-body" id="edit_div">
              <form method="post" action="<?php echo URL_ROOT; ?>/users/update_user">
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="input-username" name="new_username" class="form-control form-control-alternative" placeholder="new username">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" name="new_email" class="form-control form-control-alternative" placeholder="Exempl@example.com">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Full Name</label>
                        <input type="text" id="input-last-name" name="new_fullname" class="form-control form-control-alternative" placeholder="new fullname">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Password</label>
                        <input type="text" id="input-password" name="new_password" class="form-control form-control-alternative" placeholder="new password">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="form-check">
                  <input class="form-check-input" name="notifs" type="checkbox" <?php if ($_SESSION['notification']) echo 'checked'; ?>> Notifications in your email
                </div>
                <div class="pl-lg-4">
                  <div class="d-flex my-3 w-100 h-auto mx-auto">
                    <input type="submit" class="update-btn btn btn-outline-success h-auto mx-2 shadow" value="update">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="gallery-container row mr-5 gal">
        <?php foreach ($data['posts'] as $post) :
          if ($post->userId == $_SESSION['user_id']) : ?>
            <div class="gallery rounded  h-auto">
              <div class="p-2 mb-3 w-auto h-100">
                <img class="card-img-top rounded w-100 mb-3 shadow gallery-img" style="height: 20rem; object-fit:cover;" src="<?php echo $post->content; ?>" alt="<?php echo $post->title; ?>">
                <div class="w-100 h-auto">
                  <a href="<?php echo URL_ROOT; ?>/posts/del_post/<?php echo $post->postId ?>"><i class="fa fa-trash shadow h-auto" value="Delete" name="delete" style="font-size: 25px; color:#be9e98"></i></a>
                  <a href="<?php echo URL_ROOT; ?>/users/set_pdp/<?php echo $post->postId ?>"><i class="fa fa-pencil-square" title="set as profile pic" style="font-size: 23px; color:#be9e98"></i></a>
                </div>
              </div>
            </div>
        <?php endif;
        endforeach; ?>
      </div>
    </div>
  </div>
<?php else : redirect('users/login');
endif; ?>
<?php require_once CAMAGRU_ROOT . '/Views/inc/footer.php'; ?>