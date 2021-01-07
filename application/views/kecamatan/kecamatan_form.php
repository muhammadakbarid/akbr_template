<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button; ?> Kecamatan</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                        <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="<?php echo $action; ?>" method="post">
                    <div class="form-group">
                        <label for="char">Kabupaten <?php echo form_error('id_kab') ?></label>
                        <select name="id_kab" class="form-control select2" style="width: 100%;">
                            <option value="">Pilih Provinsi</option>
                            <?php if ($list_kabupaten) : ?>
                                <?php foreach ($list_kabupaten as $lpr) : ?>
                                    <option value="<?php echo $lpr->id_kab ?>" <?php echo ($id_kab == $lpr->id_kab ? "selected" : "") ?>><?php echo $lpr->nama ?></option>
                                <?php endforeach ?>
                            <?php endif ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tinytext">Nama <?php echo form_error('nama') ?></label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                    </div>
                    <input type="hidden" name="id_kec" value="<?php echo $id_kec; ?>" />
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                    <a href="<?php echo site_url('kecamatan') ?>" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>