<div class="card card-docs">
    <form action="<?= base_url("user/ubah/".$id) ?>" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="user">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Nama" value="<?= $data_user->nama ?>"/>
            </div>
            <div class="form-group">
                <label for="user">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email" value="<?= $data_user->email ?>"/>
            </div>
            <div class="form-group">
                <label for="user">username</label>
                <input type="text" name="username" class="form-control" placeholder="Username" value="<?= $data_user->username ?>"/>
            </div>
            <div class="form-group">
                <label for="user">Jenis Kelamin</label>
                <select class="form-control form-control-lg" name="jenis_kelamin">
                    <option value="Laki-Laki" <?= $data_user->jenis_kelamin == "Laki-Laki"? "selected" :"" ?>>Laki-Laki</option>
                    <option value="Perempuan" <?= $data_user->jenis_kelamin == "Perempuan"? "selected" :"" ?>>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="user">Level</label>
                <select class="form-control form-control-lg" name="level">
                    <option value="1" <?= $data_user->level == "1"? "selected" :"" ?>>Admin</option>
                    <option value="2" <?= $data_user->level == "2"? "selected" :"" ?>>Kasir</option>
                    <option value="3" <?= $data_user->level == "3"? "selected" :"" ?>>Manager</option>
                </select>
            </div>
            <div class="form-group d-flex align-items-center row">
                <label class="col-sm-3 col-form-label">Status</label>
                <div class="col-9 d-flex flex-row">
                    <div class="form-check-inline me-2" style="margin-right: 20px;">
                        <input class="form-check-input" type="radio" name="status" value="1" <?= $data_user->status == "1"? "checked" :"" ?>>
                        <label class="form-check-label" for="inlineRadio1">Aktif</label>
                    </div>
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" name="status" value="0" <?= $data_user->status == "0"? "checked" :"" ?>>
                        <label class="form-check-label" for="inlineRadio2">Tidak Aktif</label>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success mr-2" name="submit" value="true">Submit</button>
            <button class="btn btn-light">Cancel</button>
            <?php if($pesan!=""){ ?>
            <div class="alert alert-danger nobottommargin">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon-remove-sign"></i> <?= $pesan; ?>
            </div>
            <?php } ?>
        </div>
    </form>
</div>