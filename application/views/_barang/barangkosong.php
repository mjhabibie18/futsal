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
        Data Barang
        <small>Waroeng Bola</small>
      </h1>
    	 <ol class="breadcrumb">
        <li><a href="<?=site_url('barangkosong')?>"><i class="fa fa-list"></i></a></li>
        <li class="active">Data Barang</li>
      </ol>

      <br></br>
      <div class="box-body table-responsive">

          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Kategori Barang</th>
                <th>Ukuran Barang</th>
                <th>Harga Jual</th>
                <th>Harga Beli</th>
                <th>Stok Barang</th>
                <th>Nama Pemasok</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1;
              foreach($barangkosong as $row): ?>

                <tr>
                   <td><?=$no++?></td>
                  <td><?=$row->kode_brg?></td>
                  <td><?=$row->nama_brg?></td>
                  <td><?=$row->kategori_brg?></td>
                  <td><?=$row->ukuran_brg?></td>
                  <td><?=$row->hrg_jual?></td>
                  <td><?=$row->hrg_beli?></td>
                  <td><?=$row->stok_brg?></td>
                  <td><?=$row->nama_pemasok?></td>
                  <td class="text-left" width="160px">
                   <a href="<?=site_url('datapembelian/add/'.$row->kode_brg)?>" class="btn btn-primary btn-sm">
                        <i class="fa fa-pencil"></i> Order
                    </a>
                </tr>

        <?php endforeach; ?>
            </tbody>
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
