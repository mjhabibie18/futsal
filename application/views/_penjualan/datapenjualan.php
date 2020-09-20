<section class="content">
        <div class="pull-right"><a class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_add_new"> Tambah Transaksi</a></div>       
    
      <br></br>
      <div class="box-body table-responsive">

          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Booking</th>
                <th>Waktu Transaksi</th>
                <th>Waktu Booking</th>
                <th>Nomor Lapangan</th>
                <th>Lama Sewa</th>
                <th>Jumlah Harga</th>
                <th>ID Customer</th>
                <th>Nama Customer</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody id="tabel_transaksi">
            </tbody>    
            </td>
            </tr>
            </thead>
          </table>

          <div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Transaksi Baru</h3>
            </div>
            <form class="form-horizontal" method="post">
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Booking</label>
                        <div class="col-xs-8">
                            <input id="kodeBooking" name="kode_booking" class="form-control" type="text" placeholder="Kode Booking..." required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Waktu Transaksi</label>
                        <div class="col-xs-8">
                            <input name="waktu_transaksi" class="form-control" type="datetime-local"  required>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Waktu Booking</label>
                        <div class="col-xs-8">
                            <input name="nama_barang" class="form-control" type="datetime-local"  required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nomor Lapangan</label>
                        <div class="col-xs-8">
                            <input name="harga" class="form-control" type="number" placeholder="Nomor Lapangan..." required>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-xs-3" >Lama Sewa</label>
                        <div class="col-xs-8">
                            <input name="harga" class="form-control" type="number" placeholder="Lama Sewa..." required>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-xs-3" >Harga Perjam</label>
                        <div class="col-xs-8">
                            <input name="harga" class="form-control" type="text" readonly="readonly" value="120000" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jumlah Harga</label>
                        <div class="col-xs-8">
                            <input name="harga" class="form-control" type="text" placeholder="Harga..." required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >ID Customer</label>
                        <div class="col-xs-8">
                            <input name="nama" class="form-control" type="text" placeholder="Nama Customer..." required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Customer</label>
                        <div class="col-xs-8">
                            <input name="nama" class="form-control" type="text" placeholder="Nama Customer..." required>
                        </div>
                    </div>
                    
                </div>
 
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        </div>


<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.dataTables.js')?>">
</script>
<script type="text/javascript">
 $(document).ready(function(){
  console.log('masuk');
    $('kodeBooking').val('coba');
 }  

      function isi_barang() {
          $.ajax({
            url: "http://localhost/waroengbola/index.php/datapenjualan/get_detail_trx",
            success: function (data) {
              console.log('masuk');
              $('#kodeBooking').val(data.kode);
          });
        }
</script>
</section>