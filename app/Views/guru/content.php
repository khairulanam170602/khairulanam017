<?php

use PhpParser\Node\Stmt\Foreach_;

echo $this->extend('template/index');
echo $this->section('content');
?>
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?php echo $title_card; ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <?php
                  if(session()->getFlashdata('success')){
                    ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Success</h5>
                        <?php echo session()->getFlashdata('success'); ?>
                    </div>
                    <?php
                  }
                  ?>
                 
                <a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>/guru/tambah"><i class="fa-solid fa-house"></i>     Input Data</a>
              <table id="dt" class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Kd Guru</th>
                      <th>Nama Guru</th>
                      <th>Alamat</th>
                      <th>E/H</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=1;
                      foreach ($data_guru as $r) {

                      ?>
                          <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $r['kd_guru']; ?></td>
                            <td><?php echo $r['nama_guru']; ?></td>
                            <td><?php echo $r['alamat_guru']; ?></td>
                            <td>
                              <a class="btn btn-xs btn-info" href="<?php echo base_url(); ?>/guru/edit/<?php echo $r['kd_guru']; ?>"><i class="fa-solid fa-edit"></i></a>
                              <a class="btn btn-xs btn-danger" href="#" onclick="return hapusConfig(<?php echo $r['kd_guru']; ?>);"><i class="fa-solid fa-trash"></i></a>
                            </td>
                          </tr>
                      <?php
                      $no++;
                      }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <script>
          function hapusConfig(id){
          Swal.fire({
title: 'Anda yakin akan menghapus data ini?',
 text: "data akan di hapus secara permanen!",
 icon: 'warning',
 showCancelButton: true,
 confirmButtonColor: '#3085d6',
 cancelButtonColor: '#d33',
 confirmButtonText: 'Ya, hapus!'
 }).then((result) => {
 if (result.isConfirmed) {
 window.location.href='<?php echo base_url(); ?>/guru/hapus/' + id;
 }
 })
          }
        </script>
<?php
echo $this->endSection();