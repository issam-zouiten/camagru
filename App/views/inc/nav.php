<header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <a class="blog-header-logo text-dark" id="logo" href="<?php echo URL_ROOT ?>/posts">Camagru</a>
      </div>
      <div class="col-3 text-center">
      </div>
      <?php if (isset($_SESSION['user_id'])) : ?>
        <div class="profi" >
        <div class=" pr" onclick="menuToggle()">
          <img class="profile rounded-circle border border-info" src="<?php echo $_SESSION['user_img'] ?>" alt="profile">
      </div>
      <div class="mono ">
        <h3><strong><?php echo ucfirst($_SESSION['user_fullname']) ?></strong></h3>
        <ul>
          <li><img class="profile rounded-circle border border-info" src="<?php echo $_SESSION['user_img']?>" alt="profile"><a class="btn btn-sm mx-2" href="<?php echo URL_ROOT ?>/users/profile">My profile</a></li>
          <li><img  src="https://www.flaticon.com/svg/static/icons/svg/633/633594.svg"><a class="btn btn-sm mx-3" href="<?php echo URL_ROOT ?>/posts/add">take pic</a></li>
          <li><img  src="https://www.flaticon.com/svg/static/icons/svg/1250/1250678.svg"><a class="btn btn-sm mx-3" href="<?php echo URL_ROOT ?>/users/logout">Log Out</a></li>
        </ul>
      </div>
      </div>
      <?php else : ?>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="btn btn-sm btn-outline-secondary mx-2" href="<?php echo URL_ROOT ?>/users/login">Log in</a>
        <a class="btn btn-sm btn-outline-secondary" href="<?php echo URL_ROOT ?>/users/signup">Sign up</a>
      </div>
      <?php endif; ?>
    </div>
    <script>
      function menuToggle(){
      const toggleMenu = document.querySelector('.mono');
      toggleMenu.classList.toggle('active');
      }
    </script>
  </header>
  <hr style="position:relative; top: -30px;">
