<div class="card card-docs">
    <form action="<?= base_url("menu/tambah") ?>" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="jenis">Jenis</label>
                <select name="jenis" class="form-control" onchange="getMakanan(this)">
                    <option>Pilih Jenis</option>
                    <?php foreach ($data_jenis as $data) { ?>
                        <option value="<?= $data->id ?>"><?= $data->jenis ?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <label for="makanan">Makanan</label>
                <select name="makanan" class="form-control" id="makanan">
                    <option>Pilih Makanan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" name="harga" class="form-control" placeholder="Harga" value="0" id="harga" onkeyup="convert('harga')"/>
            </div>
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" name="stok" class="form-control" placeholder="Stok" value="0"/>
            </div>
            <div class="form-group">
                <label for="stok">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" value=""/>
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