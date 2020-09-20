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
        Total Pendapatan
        <small>Waroeng Bola</small>
      </h1>
    	 <ol class="breadcrumb">
        <li class="active"><i class="fa fa-folder"></i></a></li>
        <li class="active">Total Pendapatan</li>
      </ol>
    <!-- Main content -->
  <section class="content">
  	<?php
	if($this->session->userdata("status") == "Pemilik") {
    echo "<input type='hidden' class='pull-right'>";
  	}
  	else
  	{
  	echo "<a href='".site_url('datalaporan/addlaporanpendapatan')."'>
    <div class='fa fa-plus pull-right btn btn-primary btn-flat'>Tambah Laporan</div></a>";
  	}
  	?>
      <br></br>
      <div class="box-body table-responsive">

          <table id ="example1"class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Id Laporan</th>
                <th>Dari Tanggal</th>
                <th>Sampai Tanggal</th>
                <th>Jenis Laporan</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1;
              foreach($laporanaruskas as $row): ?>

                <tr>
                   <td><?=$no++?></td>
                  <td><?=$row->id_laporan?></td>
                  <td><?=$row->dari_tgl?></td>
                  <td><?=$row->sampai_tgl?></td>
                  <td><?=$row->jenis_laporan?></td>
                  <td class="text-left" width="160px">
                   <a href="<?=site_url('datalaporan/cetaklaporanpendapatan/'.$row->id_laporan)?>" class="btn btn-primary btn-sm">
                        <i class="fa fa-download"></i> Cetak
                    </a>
                </tr>

        <?php endforeach; ?>
        
            </thead>
          </table>
        </div>
    </section>
    <!-- /.content -->
  </div>
          
      
    <!-- /.content-wrapper -->
   
    <?php $this->load->view('_layout/footer.php') ?>

    <!-- ./wrapper -->

    <?php $this->load->view('_layout/script.php') ?>

</body>
</html>
