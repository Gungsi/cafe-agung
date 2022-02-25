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
            <a href="<?= base_url("transaksi/tambah") ?>" class="btn btn-primary rounded btn-fw">
                <i class="mdi mdi-plus"></i>
                Tambah
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-striped" id="kt_table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Atas Nama</th>
                        <th>Kasir</th>
                        <th>Kode Diskon</th>
                        <th>Diskon (%)</th>
                        <th>Diskon (harga)</th>
                        <th>Diskon (Total)</th>
                        <th>Nomor Meja</th>
                        <th>Tanggal</th>
                        <th>Pajak</th>
                        <th>Total</th>
                        <th>Nominal</th>
                        <th>Kembalian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no=1; 
                    foreach ($data_transaksi as $data) {
                        $diskon_persen = 0;
                        $diskon_harga = 0;
                        $diskon = 0;
                        if($data->diskon_persen>0){
                            $diskon_persen = ($data->total - $data->pajak) * ($data->diskon_persen/100);
                        }
                        if($data->diskon_harga>0){
                            $diskon_harga = $data->diskon_harga;
                        }
                        $diskon = $diskon_persen + $diskon_harga;
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $data->atas_nama ?></td>
                            <td><?= $data->kasir ?></td>
                            <td><?= $data->kode ?></td>
                            <td><?= $data->diskon_persen ?>%</td>
                            <td><?= $data->diskon_harga ?></td>
                            <td>Rp.<?= number_format($diskon,0,',','.') ?></td>
                            <td><?= $data->no_meja ?></td>
                            <td>Rp.<?= number_format($data->pajak,0,',','.') ?></td>
                            <td>Rp.<?= number_format($data->total,0,',','.') ?></td>
                            <td>Rp.<?= number_format($data->nominal,0,',','.') ?></td>
                            <td>Rp.<?= number_format($data->kembalian,0,',','.')  ?></td>
                            <td>
                                <a class="btn btn-warning btn-fw" href="<?= base_url("transaksi/ubah/".$data->id) ?>"><i class="mdi mdi-pencil"></i></a>
                                <a class="btn btn-danger btn-fw" href="<?= base_url("transaksi/hapus/".$data->id) ?>"><i class="mdi mdi-delete"></i></a>
                            </td>
                        </tr>
                    <?php $no++; } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>