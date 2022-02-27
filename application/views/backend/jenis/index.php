<div class="card card-docs">
    <div class="card-header d-flex justify-content-between align-items-center">
        <!--begin::Card title-->
        <div class="card-title mb-0">
        </div>
        <div class="card-toolbar mb-0">
            <a href="<?= base_url("jenis/tambah") ?>" class="btn btn-primary rounded btn-fw">
                <i class="mdi mdi-plus"></i>
                Tambah
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="kt_table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ($data_jenis as $data) { ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $data->jenis ?></td>
                            <td><?= $data->status == "1"? "Aktif" : "Tidak Aktif" ?></td>
                            <td>
                                <a class="btn btn-warning btn-fw" href="<?= base_url("jenis/ubah/".$data->id) ?>"><i class="mdi mdi-pencil"></i></a>
                                <a class="btn btn-danger btn-fw" href="<?= base_url("jenis/hapus/".$data->id) ?>"><i class="mdi mdi-delete"></i></a>
                            </td>
                        </tr>
                    <?php $no++; } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>