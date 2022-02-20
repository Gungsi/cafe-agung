<div class="card card-docs">
    <form action="<?= base_url("jenis/ubah/".$id) ?>" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="jenis">Jenis</label>
                <input type="text" name="jenis" class="form-control" placeholder="Jenis" value="<?= $data_jenis->jenis ?>"/>
            </div>
            <div class="form-group d-flex align-items-center row">
                <label class="col-sm-3 col-form-label">Status</label>
                <div class="col-9 d-flex flex-row">
                    <div class="form-check-inline me-2" style="margin-right: 20px;">
                        <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1" <?= $data_jenis->status=="1"? "checked" : "" ?>>
                        <label class="form-check-label" for="inlineRadio1">Aktif</label>
                    </div>
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0" <?= $data_jenis->status=="0"? "checked" : "" ?>>
                        <label class="form-check-label" for="inlineRadio2">Tidak Aktif</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success mr-2" name="submit" value="true">Submit</button>
            <button class="btn btn-light">Cancel</button>
        </div>
    </form>
</div>