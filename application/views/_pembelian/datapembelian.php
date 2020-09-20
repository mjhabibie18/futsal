<section class="content">
      <br></br>
      <div class="box-body table-responsive">

          <table id="example1" class="table table-bordered table-hover">
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
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1;
              foreach($datapembelian as $row): ?>
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
                  <?php
                  if($this->session->userdata("status") == "Petugas_barang") {
                  echo "<td><a href='".site_url('datapembelian/statuspengiriman/'.$row->id_pengiriman )."'
                  class='text-left btn btn-primary btn-sm fa fa-search' width='120px'>Lacak Pengiriman</a>
                  <a href='".site_url('datapembelian/pesananditerima/'.$row->kode_pembelian)."' class='text-left btn btn-primary btn-sm fa fa-share' OnClick=\"return confirm('Apakah Anda Yakin Sudah Sesuai?');\" >Konfirmasi</a>
                  <a href='".site_url('datapembelian/returpembelian/'.$row->kode_pembelian)."' class='text-left btn btn-primary btn-sm fa fa-plus'>Retur Pembelian</td></a>
                  ";

                  }
                  else
                  {
                  echo "<td><a href='".site_url('datapembelian/konfirmasipemilik/'.$row->kode_pembelian)."'
                  class='text-left btn btn-primary btn-sm fa fa-share' width='120px' OnClick=\"return confirm('Apakah Anda Yakin Sudah Sesuai?');\">Konfirmasi</td></a>";
                  }
                  ?>
                 </tr>

        <?php endforeach; ?>
            </tbody>
          </table>
        </div>
    </section>
    <!-- /.content -->
  </div>

      