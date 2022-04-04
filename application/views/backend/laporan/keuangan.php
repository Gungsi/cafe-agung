<div class="card card-docs">
    <div class="header p-3">
        <form action="<?= base_url("laporan/keuangan") ?>" method="post">
            <div class="card-title row">
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
                        <th>Id Transaksi</th>
                        <th>Tanggal</th>
                        <th>Harga Modal</th>
                        <th>Diskon Pembayaran</th>
                        <th>Total Pembayaran</th>
                        <th>Jumlah Bayar</th>
                        <th>Pendapatan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no=1; 
                    foreach ($data_keuangan as $data) {
                        if($data->id!=null){
                        $date=date_create($data->tanggal)
                    ?>
                        <tr>
                            <td><?= $data->id ?></td>
                            <td><?= date_format($date, "d M Y H:i") ?></td>
                            <td>Rp.<?= number_format($data->harga_beli,0,',','.') ?></td>
                            <td>Rp.<?= number_format($data->diskon,0,',','.') ?></td>
                            <td>Rp.<?= number_format($data->total,0,',','.') ?></td>
                            <td>Rp.<?= number_format($data->nominal,0,',','.') ?></td>
                            <td>Rp.<?= number_format($data->pendapatan,0,',','.')  ?></td>
                            <td>
                                <a class="btn btn-primary" style="width: 50px" href="<?= base_url("transaksi/detail/".$data->id) ?>"><i class="mdi mdi-eye"></i></a>
                            </td>
                        </tr>
                    <?php $no++; } } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>