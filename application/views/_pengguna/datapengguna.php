<section class="content">
      <div class="pull-right"><a href="<?=site_url('datapengguna/add')?>" class="btn btn-primary btn-flat">
            <i class="fa fa-plus"></i>
            Tambah Pengguna
          </a>
      </div>

      <br></br>
      <div class="box-body table-responsive">

          <table id ="example1"class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Id Pengguna</th>
                <th>Username</th>
                <th>Nama Pengguna</th>
                <th>Alamat</th>
                <th>No. Telepon</th>
                <th>Email</th>
                <th>Status</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
             <?php $no=1;
              foreach($datapengguna as $row): ?>
                <tr>
                  <td><?=$no++?></td>
                  <td><?=$row->id?></td>
                  <td><?=$row->username?></td>
                  <td><?=$row->nama_pengguna?></td>
                  <td><?=$row->alamat?></td>
                  <td><?=$row->no_telp?></td>
                  <td><?=$row->email?></td>
                  <td><?=$row->status?></td>
                  
                  <td class="text-left" width="160px"><a href="<?=site_url('datapengguna/edit/'.$row->id)?>" class="btn btn-primary btn-sm">
                  <i class="fa fa-pencil"></i> Edit</a>

                  <a href="<?=site_url('datapengguna/hapus/'.$row->id)?>" onclick="return confirm ('Yakin Hapus Data ?')" class="btn btn-danger btn-sm">
                  <i class="fa fa-trash"></i> Hapus</a>
                 </td>
                </tr>

            <?php endforeach; ?>
            </tbody>    
            </td>
            </tr>
            </thead>
          </table>
        </div>
    </section>
    <!-- /.content -->
  </div>
      