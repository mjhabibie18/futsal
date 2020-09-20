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
        Ganti Password
        <small>Waroeng Bola</small>
      </h1>

       <ol class="breadcrumb">
        <li class="active">Ganti Password</li>
      </ol>
      </section>

      <br></br>
      <div class="row">
        <div class="box box-primary">
              <div class="form-group">
     <form action="<?php echo site_url('datapembelian/proseskonfirmasi');?>" method="post" role="form">
            <div class="box-body">
                <div class="form-group">
                  <div class="col-sm-12"> 
                  <label ">Password Baru</label>
                 <input type="text" class="form-control input-sm" name="password" placeholder="Masukkan Password Baru"  style="width: 200px">
                </div>
                 <div class="form-group">
                  <div class="col-sm-12"> 
                  <label ">Ketik Ulang Password Baru</label>
                 <input type="text" class="form-control input-sm"  name="repassword" placeholder="Ketik Ulang Password Baru" style="width: 200px">

                  <div class="box-footer">
                 <button  type="submit" name="<?=$page?>" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Simpan </button>
             </div>
                </div>
            </div>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
    <!-- /.content-wrapper -->
   
    <?php $this->load->view('_layout/footer.php') ?>

    <!-- ./wrapper -->

    <?php $this->load->view('_layout/script.php') ?>

</body>
</html>
