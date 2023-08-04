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
                            <input type="hidden" name="param" id="param" value="<?php echo $edit_data['kd_foto']; ?>">
                            <?php
                        }
                        ?>
                        <div class="form-group">
                            <label for="kd_foto">Kode foto</label>
                            <input type="text" name="kd_foto" id="kd_foto" value="<?php echo empty (set_value('kd_foto')) ? (empty ($edit_data['kd_foto']) ?"":$edit_data['kd_foto']) : set_value('kd_foto') ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" id="foto" value="<?php echo empty (set_value('foto')) ? (empty ($edit_data['foto']) ?"":$edit_data['foto']) : set_value('foto') ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_shar">Tanggal</label>
                            <input type="text" name="tanggal_shar" id="tanggal_shar" value="<?php echo empty (set_value('tanggal_shar')) ? (empty ($edit_data['tanggal_shar']) ?"":$edit_data['tanggal_shar']) : set_value('tanggal_shar') ?>" class="form-control">
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
