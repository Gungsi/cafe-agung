<div class="card card-docs">
    <form action="<?= base_url("makanan/ubah/".$id) ?>" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="jenis">Jenis</label>
                <select name="jenis" class="form-control">
                    <option>Pilih Jenis</option>
                    <?php foreach ($data_jenis as $data) { ?>
                        <option value="<?= $data->id ?>" <?= $data_makanan->id_jenis==$data->id? "selected" : "" ?>><?= $data->jenis ?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?= $data_makanan->nama ?>"/>
            </div>
            <div class="form-group">
                <label for="nama">Harga</label>
                <input type="text" name="harga" class="form-control" placeholder="Harga" value="<?= $data_makanan->harga_beli ?>"/>
            </div>
            <div class="form-group d-flex align-items-center row">
                <label class="col-sm-3 col-form-label">Status</label>
                <div class="col-9 d-flex flex-row">
                    <div class="form-check-inline me-2" style="margin-right: 20px;">
                        <input class="form-check-input" type="radio" name="status" value="1" <?= $data_makanan->status == "1"? "checked" :"" ?>>
                        <label class="form-check-label" for="inlineRadio1">Aktif</label>
                    </div>
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" name="status" value="0" <?= $data_makanan->status == "0"? "checked" :"" ?>>
                        <label class="form-check-label" for="inlineRadio2">Tidak Aktif</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success mr-2" name="submit" value="true">Submit</button>
            <a href="<?= base_url("menu") ?>" class="btn btn-light">Cancel</a>
            <?php if($pesan!=""){ ?>
            <div class="alert alert-danger nobottommargin mt-2">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon-remove-sign"></i> <?= $pesan; ?>
            </div>
            <?php } ?>
        </div>
    </form>
</div>