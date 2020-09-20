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
              <h3 class="box-title">Form Data Barang</h3>
             <div class="pull-right">
            <a href="<?=site_url('databarang/index')?>" class="btn btn-warning btn-flat">
              <i class="fa fa-undo"></i> Kembali
            </a>
          </div>
            </div>
            <!-- /.box-header -->
      
            <!-- form start -->
            <form action="<?php echo site_url('databarang/process'); ?>" method="post" role="form">
              <div class="box-body">
                <div class="form-group ">
                  <label ">Kode Barang</label>
                  <?php 
                    if ($page == "edit") {
                    echo "<input type='text' class='form-control input-sm' value='$row->kode_brg' name='kode_brg' placeholder='Masukkan Kode Barang' readonly='readonly' style='width: 200px'>";
                    }
                    else{
                      echo "<input type='text' class='form-control input-sm' value='$kode' name='kode_brg' placeholder='Masukkan Kode Barang' readonly='readonly' style='width: 200px'>";
                    }
                   ?>
                </div>
                <div class="form-group">
                  <label ">Nama Barang</label>
                  <input type="text" class="form-control input-sm" value="<?=$row->nama_brg?>" name="nama_brg" placeholder="Masukkan Nama Barang" style="width: 200px">
                </div>
                <div class="form-group">
                    <label>Kategori Barang</label>
                    <select type="text" name="kategori_brg" class="form-control input-sm" style="width: 200px">
                      <option value="<?=$row->kategori_brg?>">
                      --  Pilih Kategori Barang --
                      </option>
                      <?php
                       foreach ($dropdown->result() as $baris) {
                  echo "<option value='".$baris->kategori_brg."'>".$baris->kategori_brg."</option>";
                        }
                        ?>
                    </select>
                  </div>
                  <div class="form-group">
                  <label ">Ukuran Barang</label>
                  <input type="text" class="form-control input-sm" value="<?=$row->ukuran_brg?>" name="ukuran_brg" placeholder="Masukkan Ukuran Barang" style="width: 200px">
                </div>
                <div class="form-group">
                  <label ">Harga Jual</label>
                  <input type="text" class="form-control input-sm" value="<?=$row->hrg_jual?>" name="hrg_jual" placeholder="Masukkan Harga Jual Barang" style="width: 200px">
                </div>
                <div class="form-group">
                  <label ">Harga Beli</label>
                  <input type="text" class="form-control input-sm" value="<?=$row->hrg_beli?>" name="hrg_beli" placeholder="Masukkan Harga Beli Barang" style="width: 200px">
                </div>
                <div class="form-group">
                  <label ">Stok Barang</label>
                  <input type="text" class="form-control input-sm" value="<?=$row->stok_brg?>" name="stok_brg" placeholder="Masukkan Stok Barang" style="width: 200px">
                </div>
            <div class="form-group">
                    <label>Nama Pemasok</label>
                    <select type="text" name="nama_pemasok" class="form-control input-sm" style="width: 200px">
                      <option value="<?=$row->nama_pemasok?>">
                      --  Pilih Nama Pemasok --
                      </option>
                      <?php
                       foreach ($tampil_pengguna->result() as $pengguna) {
                  echo "<option value='".$pengguna->nama_pengguna."'>".$pengguna->nama_pengguna."</option>";
                        }
                        ?>
                    </select>
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
