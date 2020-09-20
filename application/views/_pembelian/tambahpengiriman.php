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
        Data Pengguna
        <small>Waroeng Bola</small>
      </h1>
       <ol class="breadcrumb">
        <li class="active fa fa-send"></i></a></li>
        <li class="active">Status Pengiriman</li>
        <li class="active">Form Status Pengiriman</li>
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
              <h3 class="box-title">Form Status Pengiriman</h3>
             <div class="pull-right">
            <a href="<?=site_url('datapembelian/lacakpengiriman')?>" class="btn btn-warning btn-flat">
              <i class="fa fa-undo"></i> Kembali
            </a>
          </div>
            </div>
            <!-- /.box-header -->
      
            <!-- form start -->
            <form action="<?php echo site_url('datapembelian/proses'); ?>" method="post" role="form">
              <div class="box-body">
                  <div class="form-group">
                  <label ">Id Pengiriman</label>
                  <input type="text" class="form-control input-sm" value="<?=$row->id_pengiriman?>" name="id_pengiriman" placeholder="Masukkan Username" style="width: 200px" readonly="readonly">
                </div>
                  <div class="form-group">
                  <label ">Status Pengiriman</label>
                  <input type="text" class="form-control input-sm" name="status_pengiriman" placeholder="Masukkan Status Pengiriman" style="width: 200px	">
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                 <button  type="submit" name="<?=$page?>" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Simpan </button>
                    <button type="Reset" class="btn btn-danger btn-flat"> Reset </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
</body>
          <!-- /.box -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

   
    </section>
    <!-- /.content-wrapper -->
   
    <?php $this->load->view('_layout/footer.php') ?>

    <!-- ./wrapper -->

    <?php $this->load->view('_layout/script.php') ?>

</body>
</html>