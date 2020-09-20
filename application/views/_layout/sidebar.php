  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/img/user-admin.png') ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p> <span class="hidden-xs" ><?php echo $this->session->userdata("username")?></span></p> 
          <a><i class="fa fa-circle text-success"></i>Online</a>
        </div>
      </div> 
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <?php 
          if ( $this->session->userdata("id_role") == '1') {
          echo "
        <li class='header'>MAIN NAVIGATION</li>
        <li>
          <a href='".site_url('welcome/dash')."'>
            <i class='fa fa-dashboard'></i> <span>Dashboard</span>
            <span class='pull-right-container'>
            </span>
          </a>
          <li>
          <a href='".site_url('datapenjualan')."'>
            <i class='fa fa-files-o'></i>
            <span>Data Transaksi</span>
            <span class='pull-right-container'>
            </span>
          </a>
          </li> 
          ";
        }
         if ( $this->session->userdata("id_role") == '2') {
          echo "
        <li class='header'>MAIN NAVIGATION</li>
        <li>
          <a href='".site_url('welcome/dash')."'>
            <i class='fa fa-dashboard'></i> <span>Dashboard</span>
            <span class='pull-right-container'>
            </span>
          </a>
          <li>
          <a href='".site_url('datapenjualan')."'>
            <i class='fa fa-files-o'></i>
            <span>Data Penjualan</span>
            <span class='pull-right-container'>
            </span>
          </a>
          </li>
        <li>
          <a href='".site_url('databarang')."'>
            <i class='fa fa-th'></i> <span>Data Barang</span>
            <span class='pull-right-container'>
            </span>
          </a>
        </li>
        <li>
         <a href='".site_url('laporanpenjualan')."'>
            <i class='fa fa-folder'></i>
            <span>Laporan Penjualan</span>
            <span class='pull-right-container'>
            </span>
          </a>
        </li>
        <li>
         <a href='".site_url('laporanaruskas')."'>
            <i class='fa fa-folder-open'></i>
            <span>Laporan Arus Kas Harian</span>
            <span class='pull-right-container'>
            </span>
          </a>
        </li>
         <li>
         <a href='".site_url('laporanpendapatan')."'>
            <i class='fa fa-folder-open'></i>
            <span>Total Pendapatan</span>
            <span class='pull-right-container'>
            </span>
          </a>
        </li>
          ";
        }
        ?>
    </section>
    <!-- /.sidebar -->
  </aside>