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
        Data Pemasok
        <small>Waroeng Bola</small>
      </h1>
    	 <ol class="breadcrumb">
        <li class="active"><i class="fa fa-book"></i></a></li>
        <li class="active">Cek Order Pembelian</li>
      </ol>

      <br></br>
      <div class="box-body table-responsive">

          <table id="example1" class="table table-bordered table-hover">
            <thead>
             <tr>
                <th>No</th>
                <th>Kode Pembelian</th>
                <th>Tgl Pembelian</th>
                <th>Kode Barang</th>
                <th>Jumlah Barang</th>
                <th>Harga Beli</th>
                <th>Nama Pemasok</th>
                <th>Jumlah Harga</th>
                <th>Status Pembelian</th>
                <th>Id Pengiriman</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1;
              foreach($datapembelian as $row): ?>

                <tr>
                   <td><?=$no++?></td>
                  <td><?=$row->kode_pembelian?></td>
                  <td><?=$row->tgl_pembelian?></td>
                  <td><?=$row->kode_brg?></td>
                  <td><?=$row->jml_brg?></td>
                  <td><?=$row->hrg_brg?></td>
                  <td><?=$row->nama_pengguna?></td>
                  <td><?=$row->jml_hrg?></td>
                  <td><?=$row->status_penjual?></td>
                  <td><?=$row->id_pengiriman?></td>
                  <?php
                  if($this->session->userdata("status") == "Petugas_barang") {
                  echo "<td><a href='".site_url('datapembelian/edit/'.$row->kode_pembelian)."'
                  class='text-left btn btn-primary btn-sm fa fa-search' width='120px'>Lacak Pengiriman</td></a>";
                  }
                  else
                  {
                  echo "<td><a href='".site_url('datapembelian/edit/'.$row->kode_pembelian)."'
                  class='text-left btn btn-primary btn-sm fa fa-share' width='120px'>Konfirmasi</td></a>";
                  }
                  ?>
                 </tr>

        <?php endforeach; ?></td>
            </thead>
            </table>
        </div>
      </section>
    </div>

   
    <!-- /.content-wrapper -->
   
    <?php $this->load->view('_layout/footer.php') ?>

    <!-- ./wrapper -->

    <?php $this->load->view('_layout/script.php') ?>

</body>
</html>
