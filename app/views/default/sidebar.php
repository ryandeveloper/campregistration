    <?php $userinfo = View::userInfo(); ?>

    <!-- Add "fixed" class to make the sidebar fixed always to the browser viewport. -->
    <!-- Adding class "toggle-others" will keep only one menu item open at a time. -->
    <!-- Adding class "collapsed" collapse sidebar root elements and show only icons. -->
    <div class="sidebar-menu toggle-others fixed">
      
      <div class="sidebar-menu-inner">  
        
        <header class="logo-env">
          
          <!-- logo -->
          <div class="logo">
            <a href="dashboard-1.html" class="logo-expanded">
              <img src="<?php echo View::url('app/views/default/assets/images/logo@2x.png'); ?>" width="80" alt="" />
            </a>
            
            <a href="dashboard-1.html" class="logo-collapsed">
              <img src="<?php echo View::url('app/views/default/assets/images/logo-collapsed@2x.png'); ?>" width="40" alt="" />
            </a>
          </div>
          
          <!-- This will toggle the mobile menu and will be visible only on mobile devices -->
          <div class="mobile-menu-toggle visible-xs">
            <a href="#" data-toggle="user-info-menu">
              <i class="fa-bell-o"></i>
              <span class="badge badge-success">7</span>
            </a>
            
            <a href="#" data-toggle="mobile-menu">
              <i class="fa-bars"></i>
            </a>
          </div>
          
          <!-- This will open the popup with user profile settings, you can use for any purpose, just be creative -->
          <div class="settings-icon">
            <a href="#" data-toggle="settings-pane" data-animate="true">
              <i class="linecons-cog"></i>
            </a>
          </div>
                 
        </header>
            
        
            
        <ul id="main-menu" class="main-menu">

        <li class="">
          <a href="#">
            <i class="linecons-params"></i>
            <span class="title">Dashboard</span>
          </a>
          <ul>
            <li><a href="<?php echo View::url(); ?>"><span class="title">Dashboard 1</span></a></li>
            <li><a href="<?php echo View::url(); ?>"><span class="title">Dashboard 2</span></a></li>
            <li><a href="<?php echo View::url(); ?>"><span class="title">Dashboard 3</span></a></li>
          </ul>
        </li>
        <li class="">
          <a href="<?php echo View::url('participants'); ?>">
            <i class="linecons-user"></i>
            <span class="title">Participants</span>
          </a>
        </li>

        <li class="">
          <a href="<?php echo View::url('churches'); ?>">
            <i class="linecons-shop"></i>
            <span class="title">Churches</span>
          </a>
        </li>

        <li class="">
          <a href="<?php echo View::url('cabins'); ?>">
            <i class="linecons-shop"></i>
            <span class="title">Cabins</span>
          </a>
        </li>
        
        <li class="">
          <a href="<?php echo View::url('tents'); ?>">
            <i class="linecons-shop"></i>
            <span class="title">Tents</span>
          </a>
        </li>
        
        <li class="">
          <a href="<?php echo View::url('finances'); ?>">
            <i class="linecons-inbox"></i>
            <span class="title">Finances</span>
          </a>
        </li>

        <?php if($userinfo->Level == 1) { ?>
        <li class="">
          <a href="<?php echo View::url('products'); ?>">
            <i class="linecons-desktop"></i>
            <span class="title">Products</span>
          </a>
        </li>

        <li class="">
          <a href="<?php echo View::url('role/'); ?>">
            <i class="linecons-globe"></i>
            <span class="title">Roles</span>
          </a>
        </li>

        <li class="">
          <a href="#">
            <i class="linecons-user"></i>
            <span class="title">Users</span>
          </a>
          <ul>
            <li><a href="<?php echo View::url('users/'); ?>"><span class="title">Manage Users</span></a></li>
            <li><a href="<?php echo View::url('users/add/'); ?>"><span class="title">Add New User</span></a></li>
            <li><a href="<?php echo View::url('users/trashbin/'); ?>"><span class="title">Trash Bin</span></a></li>
          </ul>
        </li>

        <li>
          <a href="<?php echo View::url(); ?>">
            <i class="linecons-star"></i>
            <span class="title">Widgets</span>
          </a>
        </li>
        <?php }; ?>
        </ul>
            
      </div>
      
    </div>