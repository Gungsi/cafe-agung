<div class="card card-docs">
    <div class="card-header" style="padding: 1.88rem 1.81rem 0 1.88rem;">
        <div class="card-title row mb-0">
            <div class="col-3">
                <div class="form-group">
                    <label>Nama Kasir</label><br>
                    <h5><?= $data_transaksi->kasir ?></h5>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>Nama Pelanggan</label><br>
                    <h5><?= $data_transaksi->atas_nama ?></h5>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>Nomor Meja</label><br>
                    <h5><?= $data_transaksi->no_meja ?></h5>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label>Tanggal</label><br>
                    <h5><?php $date=date_create($data_transaksi->create_date); echo date_format($date, "d M Y H:i"); ?></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table" id="tablePesanan">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Menu</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Catatan</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody id="listMenu">
                    <?php $no=1; foreach ($data_pesanan as $pesanan) { ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $pesanan->makanan ?></td>
                        <td>Rp.<?= number_format($pesanan->harga,0,',','.') ?></td>
                        <td><?= $pesanan->jumlah ?></td>
                        <td><?= $pesanan->catatan ?></td>
                        <td>Rp.<?= number_format($pesanan->total,0,',','.') ?></td>
                    </tr>
                    <?php $no++; }?>
                </tbody>
                <tfoot class="border-top border-grey">
                    <tr>
                        <td colspan="7" style="padding: 0">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th style="width: 80%;">Diskon</th>
                                        <td>Rp.</td>
                                        <td class="text-right">
                                            <label id="txtDiskon">Rp.<?= number_format($data_transaksi->diskon,0,',','.') ?></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 80%;">Pajak ( 10 % )</th>
                                        <td>Rp.</td>
                                        <td class="text-right">
                                            <label id="txtPajak">Rp.<?= number_format($data_transaksi->pajak,0,',','.') ?></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 80%;">Total</th>
                                        <td>Rp.</td>
                                        <td class="text-right">
                                            <label id="txtTotal">Rp.<?= number_format($data_transaksi->total,0,',','.') ?></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 80%;">Nominal</th>
                                        <td>Rp.</td>
                                        <td class="text-right">
                                            <label id="txtNominal">Rp.<?= number_format($data_transaksi->nominal,0,',','.') ?></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 80%;">Kembalian</th>
                                        <td>Rp.</td>
                                        <td class="text-right">
                                            <label id="txtKembalian">Rp.<?= number_format($data_transaksi->kembalian,0,',','.') ?></label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="card-footer text-right">
        <a href="<?= base_url("transaksi") ?>" class="btn btn-light">Cancel</a>
    </div>
</div>