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
        Form Retur Pembelian
        <small>Waroeng Bola</small>
      </h1>
    	 <ol class="breadcrumb">
        <li class="active"><i class="fa fa-pie-chart"></i></a></li>
        <li class="active">Retur Pembelian</li>
      </ol>
     
    <!-- Main content -->
       <div class="pull-right">
       <a href="<?=site_url('datapembelian')?>" class="btn btn-warning btn-flat">
              <i class="fa fa-undo"></i> Kembali
            </a></div>
      <br></br>
      <div class="row">
        <div class="box box-primary">
              <div class="form-group">
            
              <div align="right" class="col-sm-12">
                <table class="table table-striped" id="mydata">               
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
                <th>Status Penjual</th>
                <th>Id Pengiriman</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1;
              foreach($dataretur as $row): ?>
                <tr>
                   <td><?=$no++?></td>
                  <td><?=$row->kode_pembelian?></td>
                  <td><?=$row->tgl_pembelian?></td>
                  <td><?=$row->kode_brg?></td>
                  <td><?=$row->jml_brg?></td>
                  <td><?=$row->hrg_brg?></td>
                  <td><?=$row->nama_pengguna?></td>
                  <td><?=$row->jml_hrg?></td>
                  <td><?=$row->status_pembelian?></td>
                  <td><?=$row->status_penjual?></td>
                  <td><?=$row->id_pengiriman?></td>
                </tr>
        <?php endforeach; ?>
          </table>
        </div>
      </tbody>
    </table>
          <form action="<?php echo site_url('datapembelian/proseskonfirmasi');?>" method="post" role="form">
            <div class="box-body">
                <div class="form-group">
                  <div class="col-sm-12"> 
                  <label ">Id Retur Pembelian</label>
                 <input type="text" class="form-control input-sm" value="<?=$row->id_retur?>" name="id_retur" placeholder="Masukkan Id Retur"  readonly="readonly" style="width: 200px">
                </div>
             <div class="form-group">
                   <div class="col-sm-12"> 
                  <label ">Kode Pembelian</label>
                  <input type="text" class="form-control input-sm" value="<?=$row->kode_pembelian?>" name="kode_pembelian" id="kode_pembelian" placeholder="Masukkan Kode Pembelian" style="width: 200px" readonly="readonly">
                </div>
              </div>
            </div>
                <div class="form-group">
                   <div class="col-sm-12"> 
                  <label ">Tanggal Retur Pembelian</label>
                  <input type="date" class="form-control input-sm" value="<?$row->tgl_retur?>" name="tgl_retur" placeholder="Masukkan Tanggal Transaksi"  style="width: 200px">
                </div>
              </div>
                <div class="form-group">
                  <div class="col-sm-12"> 
                  <label ">Status</label>
                  <Select type="text" class="form-control input-sm" value="<?$row->status_retur?>" name="status_retur" placeholder="Masukkan Status Retur Pembelian" style="width: 200px">
                    <option>---Pilihan---</option>
                    <option>Sementara</option>
                    <option>Hutang</option>
                    <option>Dikirim Kembali</option>
                    <option>Selesai</option>
                  </Select>
                </div>
               <div class="box-footer">
              <div class="col-sm-4">
                <button  type="submit" name="<?=$page?>" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Simpan </button>
              </div>
            </div>  
    <!-- /.content -->
        </div>
        </form>
      </div></div></div></div ></div>
   
    <!-- /.content-wrapper -->
   
    <?php $this->load->view('_layout/footer.php') ?>

    <!-- ./wrapper -->

    <?php $this->load->view('_layout/script.php') ?>

</body>
</html>
