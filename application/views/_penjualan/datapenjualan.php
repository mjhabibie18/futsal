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
                            <input id="waktu_transaksi" name="waktu_transaksi" class="form-control" type="datetime-local" required>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Waktu Booking</label>
                        <div class="col-xs-8">
                            <input id="waktu_booking" name="nama_barang" class="form-control" type="datetime-local" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nomor Lapangan</label>
                        <div class="col-xs-8">
                             <select id="lapangan" type="text" name="status_pembelian" class="form-control">
                                <option>Lapangan A</option>
                                <option>Lapangan B</option>
                                <option>Lapangan C</option>
                    </select>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-xs-3" >Lama Sewa</label>
                        <div class="col-xs-8">
                            <input id="lamaSewa" name="lm_sewa" class="form-control" type="number" placeholder="Lama Sewa..." onchange="getJmlHarga()"required>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="control-label col-xs-3" >Harga Perjam</label>
                        <div class="col-xs-8">
                            <input id="hrg" name="harga" class="form-control" type="text" readonly="readonly" value="120000" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jumlah Harga</label>
                        <div class="col-xs-8">
                            <input id="jmlHrg" name="lm_sewa" class="form-control" type="text" placeholder="Harga..." required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >ID Customer</label>
                        <div class="col-xs-8">
                            <input id="idCustomer" name="id_customer" class="form-control" type="text" placeholder="Nama Customer..." onkeyup="getNama()"required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Customer</label>
                        <div class="col-xs-8">
                            <input id="namaCustomer" name="nama" class="form-control" type="text" placeholder="Nama Customer..." required>
                        </div>
                    </div>
                    
                </div>
 
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" onclick="simpanData()">Simpan</button>
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
});


function getCodes(){
  $.ajax({
          url: "http://localhost/futsal/index.php/datapenjualan/get_detail_trx",
          type:"get",
          async : false,
          dataType : 'json',
            success: function (data) {
              console.log('masuk');
              $('#kodeBooking').val(data.kode);
              console.log(data.kode);
              }
            }
          )};

 $("#modal_add_new").on('shown.bs.modal', function () {
        getCodes();
   });

 function getJmlHarga(){
    var lamaSewa = $('#lamaSewa').val();
    var harga = $('#hrg').val();
    var getJmlHarga = lamaSewa * harga;
    $('#jmlHrg').val(getJmlHarga);

 }

 function getNama(){
    var id = $('#idCustomer').val();
     $.ajax({
        type  : 'ajax',
          url: "http://localhost/futsal/index.php/datapenjualan/getNamaCustomer",
          type:"get",
          data: "ID="+id,
          dataType : 'json',
            success: function (data) {
              console.log(data);
              $('#namaCustomer').val(data[0].username);

              }
            }
          )};

    function simpanData(){
        var kode_booking = $('#kodeBooking').val();
        var wkt_transaksi = $('#waktu_transaksi').val();
        var wkt_booking = $('#waktu_booking').val();
        var no_lapangan = $('#lapangan').val();
        var lm_sewa = $('#lamaSewa').val();
        var hrg = $('#hrg').val();
        var jml_harga = $('#jmlHrg').val();
        var id_customer = $('#idCustomer').val();
        var namaCustomer = $('#namaCustomer').val();
        $.ajax({
           url: "http://localhost/futsal/index.php/datapenjualan/simpanData",
           type: 'POST',
           dataType: "JSON",
           data: {kode_booking: kode_booking,lm_sewa:lm_sewa,jml_harga:jml_harga,id_customer:id_customer,no_lapangan:no_lapangan,
            wkt_transaksi:wkt_transaksi,wkt_booking:wkt_booking},
           success: function (data) {
              console.log(data);
              alert('masuk cuy');
              }
            }
          )};

</script>
</section>