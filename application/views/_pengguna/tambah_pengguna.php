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
              <h3 class="box-title">Form Data Pengguna</h3>
             <div class="pull-right">
            <a href="<?=site_url('datapengguna/index')?>" class="btn btn-warning btn-flat">
              <i class="fa fa-undo"></i> Kembali
            </a>
          </div>
            </div>
            <!-- /.box-header -->
      
            <!-- form start -->
            <form action="<?php echo site_url('datapengguna/process'); ?>" method="post" role="form">
              <div class="box-body">
                  <input type="hidden" class="form-control input-sm" value="<?=$row->id?>" name="id" placeholder="Masukkan Id Pengguna" style="width: 200px">
                <div class="form-group">
                  <label ">Username</label>
                  <input type="text" class="form-control input-sm" value="<?=$row->username?>" name="username" placeholder="Masukkan Username" style="width: 200px" readonly="readonly">
                </div>
                  <div class="form-group">
                  <label ">Nama Pengguna</label>
                  <input type="text" class="form-control input-sm" value="<?=$row->nama_pengguna?>" name="nama_pengguna" placeholder="Masukkan Nama Pengguna" style="width: 200px">
                </div>
                <div class="form-group">
                  <label ">Password</label>
                  <input type="password" class="form-control input-sm" value="<?=$row->password?>" name="password" placeholder="Masukkan Password" style="width: 200px" readonly="readonly">
                </div>
                <div class="form-group">
                  <label ">Alamat</label>
                  <input type="text" class="form-control input-sm" value="<?=$row->alamat?>" name="alamat" placeholder="Masukkan Alamat Pengguna" style="width: 200px">
                </div>
                <div class="form-group">
                  <label ">No. Telepon</label>
                  <input type="text" class="form-control input-sm" value="<?=$row->no_telp?>" name="no_telp" placeholder="Masukkan Nomor Telepon" style="width: 200px">
                </div>
                <div class="form-group">
                  <label ">Email</label>
                  <input type="text" class="form-control input-sm" value="<?=$row->email?>" name="email" placeholder="Masukkan Email Pengguna" style="width: 200px">
                </div>
                <div class="form-group">
                  <label ">Status Pengguna</label>
                  <input type="text" class="form-control input-sm" value="<?=$row->status?>" name="status" placeholder="Masukkan Status Pengguna" style="width: 200px">
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
