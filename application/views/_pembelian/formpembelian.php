<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Waroeng Bola</title>
  <?php $this->load->view('_layout/css.php') ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php $this->load->view('_layout/header.php') ?>
  
  <!-- Left side column. contains the logo and sidebar -->
<?php $this->load->view('_layout/sidebar.php') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Pembelian
        <small>Waroeng Bola</small>
      </h1>
       <ol class="breadcrumb">
        <li><a href="<?=site_url('databarang/index')?>"><i class="fa fa-pie-chart"></i></a></li>
        <li class="active">Data Pembelian</li>
        <li class="active">Form Data Pembelian</li>
      </ol>
    
    <!-- Main content -->
   <body class="hold-transition skin-blue sidebar-mini">
<div>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Data Pembelian</h3>
              <?php
              if($this->session->userdata("status") == "Petugas_barang") {
              echo "<a href='".site_url('barangkosong')."'>
              <div class='fa fa-undo pull-right btn btn-warning btn-flat'>Kembali</div></a>";
              }
              else
              {
              echo "
              <div class=' hidden fa fa-undo pull-right btn btn-warning btn-flat'>Kembali</div></a>";
              }
              ?>
             <?php
              if($this->session->userdata("status") == "Pemilik") {
              echo "<a href='".site_url('datapembelian/lihatdatapemilik')."'>
              <div class='fa fa-undo pull-right btn btn-warning btn-flat'>Kembali</div></a>";
              }
              else
              {
              echo "
              <div class=' hidden fa fa-undo pull-right btn btn-warning btn-flat'>Kembali</div></a>";
              }
              ?>
               <?php
              if($this->session->userdata("status") == "Pemasok") {
              echo "<a href='".site_url('cekorderpembelian')."'>
              <div class='fa fa-undo pull-right btn btn-warning btn-flat'>Kembali</div></a>";
              }
              else
              {
              echo "
              <div class=' hidden fa fa-undo pull-right btn btn-warning btn-flat'>Kembali</div></a>";
              }
              ?>
            </div>
            <!-- /.box-header -->
      
            <!-- form start -->
            <form action="<?php echo site_url('datapembelian/process'); ?>" method="post" role="form">
              <div class="box-body">
              	<div class="form-group">
                  <label ">Kode Pembelian</label>
                  <?php 
                    if ($page == "edit") {
                    echo "<input type='text' class='form-control input-sm' value='$row->kode_pembelian' name='kode_pembelian' placeholder='Masukkan Kode Pembelian' readonly='readonly' style='width: 200px'>";
                    }
                    else{
                      echo "<input type='text' class='form-control input-sm' value='$kode' name='kode_pembelian' placeholder='Masukkan Kode Pembelian' readonly='readonly' style='width: 200px'>";
                    }
                   ?>
                </div>
                <div class="form-group">
                  <label ">Tanggal Pembelian</label>
                  <input type="date" class="form-control input-sm" value="" name="tgl_pembelian" placeholder="Masukkan Tanggal Transaksi"  style="width: 200px">
                </div>  
                <div class="form-group">
                  <label ">Kode Barang</label>
                  <input type="text" class="form-control input-sm" value="<?=$row->kode_brg?>" name="kode_brg" placeholder="Masukkan Kode Barang" style="width: 200px">
                </div>
                <div class="form-group">
                  <label ">Nama Barang</label>
                  <input type="text" class="form-control input-sm" value="<?=$row->nama_brg?>" name="nama_brg" placeholder="Masukkan Nama Barang" style="width: 200px">
                </div>
                <div class="form-group">
                  <label ">Jumlah Barang</label>
                  <?php 
                    if ($page == "edit") {
                    echo "<input type='text' class='form-control input-sm' value='$row->jml_brg' name='jml_brg' id='jml_brg' placeholder='Masukkan Jumlah Barang' style='width: 200px' onkeyup='total_harga()'>";
                    }
                    else{
                      echo "<input type='text' class='form-control input-sm' name='jml_brg' id='jml_brg' placeholder='Masukkan Jumlah Barang'  style='width: 200px' onkeyup='total_harga()'>";
                    }
                   ?>
                </div>
                <div class="form-group">
                  <label ">Harga Barang</label>
                  <?php 
                    if ($page == "edit") {
                    echo "<input type='text' class='form-control input-sm' value='$row->hrg_brg' name='hrg_brg' id='hrg_brg' placeholder='Masukkan Harga Barang' style='width: 200px'>";
                    }
                    else{
                      echo "<input type='text' class='form-control input-sm' value='$row->hrg_beli' name='hrg_brg' id='hrg_brg' placeholder='Masukkan Harga Barang'  style='width: 200px'>";
                    }
                   ?>
                </div>
                <div class="form-group">
                  <label ">Nama Pemasok</label>
                  <?php 
                    if ($page == "edit") {
                    echo "<input type='text' class='form-control input-sm' value='$row->nama_pengguna' name='nama_pengguna' placeholder='Masukkan Nama Pemasok' style='width: 200px'>";
                    }
                    else{
                      echo "<input type='text' class='form-control input-sm' value='$row->nama_pemasok' name='nama_pengguna' placeholder='Masukkan Nama Pemasok'  style='width: 200px'>";
                    }
                   ?>
                </div>
                <div class="form-group">
                  <label ">Jumlah Harga</label>
                  <?php 
                    if ($page == "edit") {
                    echo "<input type='text' class='form-control input-sm' value='$row->jml_hrg' name='jml_hrg' id='jml_hrg' placeholder='Masukkan Jumlah Harga' style='width: 200px'>";
                    }
                    else{
                      echo "<input type='text' class='form-control input-sm' name='jml_hrg' id='jml_hrg' placeholder='Masukkan Jumlah Harga'  style='width: 200px'>";
                    }
                   ?>
                </div>
                <div class="form-group">
                  
                    <label>Status Pembelian</label>
                    <select type="text" name="status_pembelian" class="form-control input-sm" style="width: 200px">
                    <option>Belum Dikonfirmasi</option>
                    <option>Sudah Dikonfirmasi</option>
                    <option>Selesai</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Status Penjual</label>
                    <select type="text" name="status_penjual" class="form-control input-sm" style="width: 200px">
                    <option>Belum Dikonfirmasi</option>
                    <option>Sedang Dikemas</option>
                    <option>Dikirim</option>
                    </select>
                  </div>
                  <div class="form-group">
                  <?php 
                    if($this->session->userdata("status") == "Pemasok") {
                    echo "<label>Id Pengiriman</label>
                    <input type='text' value='$kode' class='form-control input-sm' name='id_pengiriman' placeholder='Masukkan Id Pengiriman' style='width: 200px'>";
                    }
                    else{
                      echo "<input type='hidden'</input> ";
                    }
                   ?>
                </div>
                  <div class="box-footer">
                 <button  type="submit" name="<?=$page?>" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Simpan </button>
                    <button type="Reset" class="btn btn-danger btn-flat"> Reset </button>
              </div></div></form></div></div></div></section></div></body></section></div>

    <!-- /.content-wrapper -->
   
    <?php $this->load->view('_layout/footer.php') ?>

    <!-- ./wrapper -->

    <?php $this->load->view('_layout/script.php') ?>

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js')?>"></script>
<script type="text/javascript">

   function total_harga(){
          var Jumlah = $("#jml_brg").val();
          var hrg_brg = $("#hrg_brg").val();
          if (Jumlah != null && Jumlah != "") {
            var jml_hrg = Jumlah * hrg_brg;
            $("#jml_hrg").val(jml_hrg);
          } else {
            $("#jml_hrg").val('');
          }
        }


</script>
</body>
</html>
