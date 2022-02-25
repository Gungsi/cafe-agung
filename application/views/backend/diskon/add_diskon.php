<div class="card card-docs">
    <form action="<?= base_url("diskon/tambah") ?>" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="kode">Kode</label>
                <input type="text" name="kode" class="form-control" placeholder="Kode"/>
            </div>
            <div class="form-group">
                <label for="nama">Diskon %</label>
                <input type="number" name="diskon_persen" class="form-control" placeholder="10" value="0"/>
            </div>
            <div class="form-group">
                <label for="nama">Diskon Harga</label>
                <input type="text" name="diskon_harga" class="form-control" id="diskon" placeholder="10.000" value="0" onkeyup="convert('diskon')"/>
            </div>
            <div class="form-group d-flex align-items-center row">
                <label class="col-sm-3 col-form-label">Status</label>
                <div class="col-9 d-flex flex-row">
                    <div class="form-check-inline me-2" style="margin-right: 20px;">
                        <input class="form-check-input" type="radio" name="status" value="1" checked>
                        <label class="form-check-label" for="inlineRadio1">Aktif</label>
                    </div>
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" name="status" value="0">
                        <label class="form-check-label" for="inlineRadio2">Tidak Aktif</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success mr-2" name="submit" value="true">Submit</button>
            <button class="btn btn-light">Cancel</button>
            <?php if($pesan!=""){ ?>
            <div class="alert alert-danger nobottommargin mt-2">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon-remove-sign"></i> <?= $pesan; ?>
            </div>
            <?php } ?>
        </div>
    </form>
</div>