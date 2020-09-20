<header class="main-header">

    <!-- Logo -->
    <a class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Waroeng</b>B</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Waroeng</b>Bola</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
             <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  </li>
                </ul>
              </li>
              <li class="footer"></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <ul class="dropdown-menu">
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                  </li>
                </ul>
              </li>
              <li class="footer"></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <ul class="dropdown-menu">
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url('assets/img/user-admin.png') ?>" class="user-image" alt="User Image">
              <span class="hidden-xs" ><?php echo $this->session->userdata("username")?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url('assets/img/user-admin.png') ?>" class="img-circle" alt="User Image">
                <p>
                <?php echo $this->session->userdata("username")?>
                </p>
                <p>
                  <?php
                  if ($this->session->userdata("id_role") == '1'){
                  echo "Admin";
                }else{
                  echo "Customer";
                }?>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo site_url('Login/ganti_password') ?>" class="btn btn-default btn-flat">Ganti Password</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo site_url('Login/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>

    </nav>
  </header>