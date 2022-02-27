<div class="card card-docs">
    <div class="header p-3">
        <form action="<?= base_url("laporan/search_transaksi") ?>" method="post">
            <div class="card-title row">
                <div class="col-3">
                    <select name="karyawan" class="form-control">
                        <option value="">Pilih Karyawan</option>
                        <?php foreach ($data_karyawan as $data) { ?>
                            <option value="<?= $data->id ?>" <?= $karyawan == $data->id? 'selected="selected"' : ""?>><?= $data->nama ?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="col-3">
                    <input type="text" name="dates" id="dates" class="form-control" placeholder="Tanggal" value="<?= $date ?>"/>
                </div>
                <div class="col-3">
                    <button  class="btn btn-primary rounded btn-fw">
                        <i class="mdi mdi-search"></i>
                        Cari
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-striped" id="kt_table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Atas Nama</th>
                        <th>Kasir</th>
                        <th>Nomor Meja</th>
                        <th>Tanggal</th>
                        <th>Diskon (Total)</th>
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
                        // $diskon_persen = 0;
                        // $diskon_harga = 0;
                        // $diskon = 0;
                        // if($data->diskon_persen>0){
                        //     $diskon_persen = ($data->total - $data->pajak) * ($data->diskon_persen/100);
                        // }
                        // if($data->diskon_harga>0){
                        //     $diskon_harga = $data->diskon_harga;
                        // }
                        // $diskon = $diskon_persen + $diskon_harga;
                        $date=date_create($data->tanggal)
                    ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $data->atas_nama ?></td>
                            <td><?= $data->kasir ?></td>
                            <td><?= $data->no_meja ?></td>
                            <td><?= date_format($date, "d M Y H:i") ?></td>
                            <td>Rp.<?= number_format($data->diskon,0,',','.') ?></td>
                            <td>Rp.<?= number_format($data->pajak,0,',','.') ?></td>
                            <td>Rp.<?= number_format($data->total,0,',','.') ?></td>
                            <td>Rp.<?= number_format($data->nominal,0,',','.') ?></td>
                            <td>Rp.<?= number_format($data->kembalian,0,',','.')  ?></td>
                            <td>
                                <!-- <a class="btn btn-warning" href="<?= base_url("transaksi/ubah/".$data->id) ?>"><i class="mdi mdi-pencil"></i></a>
                                <a class="btn btn-danger" href="<?= base_url("transaksi/hapus/".$data->id) ?>"><i class="mdi mdi-delete"></i></a> -->
                                <a class="btn btn-primary" style="width: 50px" href="<?= base_url("transaksi/detail/".$data->id) ?>"><i class="mdi mdi-eye"></i></a>
                            </td>
                        </tr>
                    <?php $no++; } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>