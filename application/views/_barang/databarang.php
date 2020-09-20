<section class="content">
    <?php
    if($this->session->userdata("status") == "Kasir") {
    echo "<input type='hidden' class='pull-right'>";
    }
    else
    {
    echo "<a href='".site_url('databarang/add')."'>
    <div class='pull-right fa fa-plus btn btn-primary btn-flat'>Tambah Barang</div></a>";
    }
    ?>
      <br></br>
      <div class="box-body table-responsive">

          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Kategori Barang</th>
                <th>Ukuran Barang</th>
                <th>Harga Jual</th>
                <th>Harga Beli</th>
                <th>Stok Barang</th>
                <th>Nama Pemasok</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1;
              foreach($databarang as $row): ?>

                <tr>
                   <td><?=$no++?></td>
                  <td><?=$row->kode_brg?></td>
                  <td><?=$row->nama_brg?></td>
                  <td><?=$row->kategori_brg?></td>
                  <td><?=$row->ukuran_brg?></td>
                  <td><?=$row->hrg_jual?></td>
                  <td><?=$row->hrg_beli?></td>
                  <td><?=$row->stok_brg?></td>
                  <td><?=$row->nama_pemasok?></td>
                </tr>

        <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </section>
    </div>