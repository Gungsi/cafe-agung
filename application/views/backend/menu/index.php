<div class="card card-docs">
    <div class="card-header d-flex justify-content-between align-items-center">
        <!--begin::Card title-->
        <div class="card-title mb-0">
            <!-- <div class="d-flex align-items-center"> -->
                <!--begin::Input group-->
                <!-- <div class="position-relative w-md-400px">
                    <i class="mdi mdi-search"></i>
                    <input type="text" class="form-control  ps-10 w-100" id="cari" name="search" placeholder="Search" onkeypress="filter()"/>
                </div> -->
                <!--end::Input group-->
            <!-- </div> -->
        </div>
        <div class="card-toolbar mb-0">
            <a href="<?= base_url("menu/tambah") ?>" class="btn btn-primary rounded btn-fw">
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
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ($data_menu as $data) { ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $data->jenis ?></td>
                            <td><?= $data->makanan ?></td>
                            <td>Rp.<?= number_format($data->harga,0,',','.')  ?></td>
                            <td><?= $data->stok ?></td>
                            <td><?= $data->keterangan ?></td>
                            <td>
                                <a class="btn btn-warning btn-fw" href="<?= base_url("menu/ubah/".$data->id) ?>"><i class="mdi mdi-pencil"></i></a>
                                <a class="btn btn-danger btn-fw" href="<?= base_url("menu/hapus/".$data->id) ?>"><i class="mdi mdi-delete"></i></a>
                            </td>
                        </tr>
                    <?php $no++; } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>