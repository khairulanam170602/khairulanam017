<?php
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
                <form action="<?php echo $action; ?>" method="post">
                    <div class="card-body">
                    <?php if(validation_errors()){
                    ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                            <?php echo validation_list_errors() ?>
                    </div>
                    <?php
                    }
                    ?>

                    <?php
                    if(session()->getFlashdata('errors')){
                    ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-warning"></i> Errors</h5>
                        <?php echo session()->getFlashdata('errors'); ?>
                    </div>
                    <?php
                    }
                    ?>
                    
                        <?php echo csrf_field() ?>
                        <?php
                        if(current_url(true)->getSegment(2) =='edit'){
                            ?>
                            <input type="hidden" name="param" id="param" value="<?php echo $edit_data['kd_prodi'];?>">
                            <?php
                        }
                        
                        ?>
                        <div class="form-group">
                            <label for="nama_prodi">Kode jurusan</label>
                            <input type="text" name="kd_prodi" id="kd_prodi" value="<?php echo empty (set_value('kd_prodi')) ? (empty ($edit_data['kd_prodi']) ?"":$edit_data['kd_prodi']) : set_value('ka_prodi') ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nama_siswa">nama siswa</label>
                            <input type="text" name="nama_siswa" id="nama_siswa" value="<?php echo empty (set_value('nama_siswa')) ? (empty ($edit_data['nama_siswa']) ?"":$edit_data['nama_siswa']) : set_value('nama_siswa') ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nama_prodi">Nama jurusan</label>
                            <input type="text" name="nama_prodi" id="nama_prodi" value="<?php echo empty (set_value('nama_prodi')) ? (empty ($edit_data['nama_prodi']) ?"":$edit_data['nama_prodi']) : set_value('nama_prodi') ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="fakultas">Kelas</label>
                            <input type="text" name="fakultas" id="fakultas" value="<?php echo empty (set_value('fakultas')) ? (empty ($edit_data['fakultas']) ?"":$edit_data['fakultas']) : set_value('fakultas') ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
echo $this->endSection();