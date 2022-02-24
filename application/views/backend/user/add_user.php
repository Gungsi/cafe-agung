<div class="card card-docs">
    <form action="<?= base_url("user/tambah") ?>" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="user">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Nama"/>
            </div>
            <div class="form-group">
                <label for="user">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email"/>
            </div>
            <div class="form-group">
                <label for="user">username</label>
                <input type="text" name="username" class="form-control" placeholder="Username"/>
            </div>
            <div class="form-group">
                <label for="user">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password"/>
            </div>
            <div class="form-group">
                <label for="user">Jenis Kelamin</label>
                <select class="form-control form-control-lg" name="jenis_kelamin">
                    <option>Pilih Level</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="user">Level</label>
                <select class="form-control form-control-lg" name="level">
                    <option>Pilih Level</option>
                    <option value="1">Admin</option>
                    <option value="2">Kasir</option>
                    <option value="3">Manager</option>
                </select>
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