<?php $userinfo = View::userInfo(); ?>

<nav class="navbar user-info-navbar" role="navigation">
        
  <!-- Left links for user info navbar -->
  <ul class="user-info-menu left-links list-inline list-unstyled">
    
    <li class="hidden-sm hidden-xs">
      <a href="#" data-toggle="sidebar">
			<i class="fa-bars"></i>
      </a>
    </li>   
  </ul>
  
  <!-- Right links for user info navbar -->
  <ul class="user-info-menu right-links list-inline list-unstyled">
    
    <li class="search-form"><!-- You can add "always-visible" to show make the search input visible -->
      
      <form method="get" action="extra-search.html">
        <input type="text" name="s" class="form-control search-field" placeholder="Type to search..." />
        
        <button type="submit" class="btn btn-link">
          <i class="linecons-search"></i>
        </button>
      </form>
      
    </li>
    
    <li class="dropdown user-profile">
      <a href="#" data-toggle="dropdown">
        <?php $avatar = View::common()->getUploadedFiles($userinfo->Avatar); ?>
        <img src="<?php echo ($userinfo->Avatar) ? View::url('/assets/files/') . $avatar[0]->FileSlug : View::url('/assets/images/user-4.png'); ?>" alt="user-image" class="img-circle img-inline userpic-32" width="28">
        <span>
          <?php echo $userinfo->FirstName; ?> <?php echo $userinfo->LastName; ?>
          <i class="fa-angle-down"></i>
        </span>
      </a>
      
      <ul class="dropdown-menu user-profile-menu list-unstyled">
        <li>
          <a href="<?php View::url('users/profile', true) ?>">
            <i class="fa-user"></i>
            Profile
          </a>
        </li>
        <li>
          <a href="<?php echo View::url('users/edit/'.$userinfo->UserID); ?>">
            <i class="fa-wrench"></i>
            Edit Profile
          </a>
        </li>
        <li class="">
          <a href="<?php View::url('users/logout', true) ?>">
            <i class="fa-lock"></i>
            Logout
          </a>
        </li>
      </ul>
    </li>
    
  </ul>
  
</nav>