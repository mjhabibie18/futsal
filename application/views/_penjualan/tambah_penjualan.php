<body class="hold-transition skin-blue sidebar-mini">
<div>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12 ">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Data Penjualan</h3>
             <div class="pull-right">
            <a href="<?=site_url('datapenjualan/index')?>" class="btn btn-warning btn-flat">
              <i class="fa fa-undo"></i> Kembali
            </a>
          </div>
            </div>      
      
            <!-- form start -->
           
              <div class="row">
                <div class="form-group">
             <div class="box-body table-responsive">
              <div align="right" class="col-sm-12">
                <table class="table table-striped" id="mydata">               
                 <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Transaksi</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Ukuran Barang</th>
                  <th>Harga Barang</th>
                  <th>Jumlah Barang</th>
                  <th>Total Harga</th>
                </tr>
                </thead>
                <tbody id="show_data">
                </tbody>
              </table>
              </div>
             <form action="<?php echo site_url('datapenjualan/process'); ?>" method="post" role="form">
                <div class="form-group">
                  <div class="col-sm-4"> 
                  <label ">Kode Transaksi</label>
                 <input type="text" class="form-control input-sm" value="<?=$kode?>" name="kode_trx" placeholder="Masukkan Kode Barang"  readonly="readonly" style="width: 200px">
                </div>
              </div>
                <div class="form-group">
                   <div class="col-sm-4"> 
                  <label ">Tanggal Transaksi</label>
                  <input type="date" class="form-control input-sm" value="<?php echo date('Y-m-d')?>" name="tgl_trx" placeholder="Masukkan Tanggal Transaksi"  style="width: 200px">
                </div>
              </div>
                <div class="form-group">
                   <div class="col-sm-4"> 
                  <label ">Jumlah Harga</label>
                  <input type="text" class="form-control input-sm" value="<?=$row->jml_hrg?>" name="jml_hrg" id="jml_hrg" placeholder="Masukkan Jumlah Harga" style="width: 200px">
                </div>
              </div>
            </div>
               <div class="box-body">
              <div class="col-sm-4">
                 <button  type="submit" name="<?=$page?>" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Simpan </button>
              </div>
            </div>
              
              <!-- /.box-body -->
             
            </form>
               <form action="<?php echo site_url('datapenjualan/prosesdetail'); ?>" method="post" role="form">
                  <div class="box-body">
                    <div class="form-group">
                  <div class="col-sm-12"> 
                  <label ">Kode Transaksi</label>
                 <input type="text" class="form-control input-sm" value="<?=$kode?>" name="kode_trx" onkeyup="isi_detail()" placeholder="Masukkan Kode Barang" id="kode_trx" style="width: 200px"">
                
                </div>
              </div>
                  <div class="form-group">
                   <div class="col-sm-12"> 
                  <label ">Kode Barang</label>
                  <input type="text" class="form-control input-sm" value="<?=$row->kode_brg?>" name="kode_brg" placeholder="Masukkan Kode Barang" id="kode_brg" style="width: 200px" onkeyup="isi_barang()">
                </div>
              </div>
                <div class="form-group">
                   <div class="col-sm-4"> 
                  <label ">Nama Barang</label>
                  <input type="text" class="form-control input-sm" value="<?=$row->nama_brg?>" name="nama_brg" placeholder="Masukkan Nama Barang" id="nama_brg" style="width: 200px" >
                </div>
              </div>
                <div class="form-group">
                   <div class="col-sm-4"> 
                  <label ">Ukuran Barang</label>
                  <input type="text" class="form-control input-sm" value="<?=$row->ukuran_brg?>" name="ukuran_brg" placeholder="Masukkan Ukuran Barang" id="ukuran_brg" style="width: 200px">
                </div>
              </div>
                  <div class="form-group">
                     <div class="col-sm-4"> 
                  <label ">Harga Barang</label>
                  <input type="text" class="form-control input-sm" value="<?=$row->hrg_brg?>" name="hrg_brg" id="hrg_brg" placeholder="Masukkan Harga Barang" style="width: 200px">
                </div>
              </div>
                <div class="form-group">
                   <div class="col-sm-4"> 
                  <label ">Jumlah Barang</label>
                  <input type="text" class="form-control input-sm" value="<?=$row->jml_brg?>" name="jml_brg" id="jml_brg" placeholder="Masukkan Jumlah Barang" style="width: 200px"  onkeyup="total_harga()">
                </div>
              </div>
                <div class="form-group">
                   <div class="col-sm-8"> 
                  <label ">Total Harga</label>  
                  <input type="text" class="form-control input-sm" value="<?=$row->hrg_total?>" name="hrg_total" id="hrg_total" placeholder="Masukkan Total Harga Barang" style="width: 200px">
                </div>
              </div>
            </div>
              <div class="box-footer">
               <div class="col-sm-4">
                 <button  type="submit" name="<?=$page?>" class="btn btn-success btn-flat"><i class="fa fa-plus "></i> Tambah </button>
               </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</form>
</div>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.dataTables.js')?>"></script>
<script type="text/javascript">

        function total_harga(){
          var Jumlah = $("#jml_brg").val();
          var hrg_brg = $("#hrg_brg").val();
          if (Jumlah != null && Jumlah != "") {
            var totalHarga = Jumlah * hrg_brg;
            $("#hrg_total").val(totalHarga);
            $("#jml_hrg").val(totalHarga);
          } else {
            $("#hrg_total").val('');
          }
        }

        function isi_barang() {
          var kode = $("#kode_brg").val();
          $.ajax({
            url: "http://localhost/waroengbola/index.php/datapenjualan/get_barang",
            data: "kode_brg="+kode,
            success: function (data) {
              var json = data;
              obj = JSON.parse(json);
              if(obj.pesan == 'sukses') {
                $('#nama_brg').val(obj.nama_brg);
                $('#ukuran_brg').val(obj.ukuran_brg);
                $('#hrg_brg').val(obj.hrg_jual);
              } else if(obj.pesan == 'stok habis') {
                alert('Maaf stok barang kosong');
                $('#kode_brg').val('');
              }
               else {
                $('#nama_brg').val(obj.nama_brg);
                $('#ukuran_brg').val(obj.ukuran_brg);
                $('#hrg_brg').val(obj.hrg_jual);
              }
            }
          });
        }

   $(document).ready(function(){
    tampil_data_barang(); //pemanggilan fungsi tampil barang.
    
    $('#mydata').dataTable();
     
    //fungsi tampil barang
    function tampil_data_barang(){
        $.ajax({
            type  : 'ajax',
            url   : "http://localhost/waroengbola/index.php/datapenjualan/data_barang",
            async : false,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                $no =1;
                for(i=0; i<data.length; i++){
                    html += '<tr>'+
                                '<td>'+$no+++'</td>'+
                                '<td>'+data[i].kode_trx+'</td>'+
                                '<td>'+data[i].kode_brg+'</td>'+
                                '<td>'+data[i].nama_brg+'</td>'+
                                '<td>'+data[i].ukuran_brg+'</td>'+
                                '<td>'+data[i].hrg_brg+'</td>'+
                                '<td>'+data[i].jml_brg+'</td>'+
                                '<td>'+data[i].hrg_total+'</td>'+
                            '</tr>';
                }
                $('#show_data').html(html);
            }

        });
    }

  });

    </script>

</body>
</html>





