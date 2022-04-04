<div class="card card-docs">
    <form action="<?= base_url("transaksi/tambah") ?>" id="add_transaksi" method="post">
        <div id="formCreateTransaksi">
            <div class="card-header">
                <div class="card-title row">
                    <div class="col-3">
                        <div class="form-group">
                            <label>Nama Kasir</label>
                            <input type="hidden" name="id_kasir" class="form-control" value="<?= $this->session->userdata('id') ?>"/>
                            <input type="text" name="kasir" class="form-control" placeholder="Kasir" value="<?= $this->session->userdata('nama') ?>" readOnly/>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Nama Pelanggan</label>
                            <input type="text" name="pelanggan" class="form-control" placeholder="Nama Pelanggan" value=""/>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Nomor Meja</label>
                            <input type="number" name="no_meja" class="form-control" placeholder="Nomor Meja" value=""/>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Tanggal</label><br>
                            <label><?= date("d M Y H:i") ?></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMenu">
                    <i class="mdi mdi-search"></i>
                    Cari Menu
                </button>
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="listMenu">
                            
                        </tbody>
                        <tfoot class="border-top border-grey">
                            <tr>
                                <td colspan="4">
                                    Cek Diskon
                                </td>
                                <td colspan="2">
                                    <input type="text" name="kode_diskon" id="kode_diskon" class="form-control" placeholder="kode" value=""/>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" onclick="checkDiskon()">
                                        Cek
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="7" style="padding: 0">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th style="width: 80%;">Diskon</th>
                                                <td>Rp.</td>
                                                <td class="text-right">
                                                    <label id="txtDiskon">0</label>
                                                    <input type="hidden" id="id_diskon" name="id_diskon" class="form-control" value="0"/>
                                                    <input type="hidden" id="diskon" name="diskon" class="form-control" value="0"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th style="width: 80%;">Pajak ( 10 % )</th>
                                                <td>Rp.</td>
                                                <td class="text-right">
                                                    <label id="txtPajak">0</label>
                                                    <input type="hidden" id="pajak" name="pajak" class="form-control" value="0"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th style="width: 80%;">Total</th>
                                                <td>Rp.</td>
                                                <td class="text-right">
                                                    <label id="txtTotal">0</label>
                                                    <input type="hidden" id="total" name="total" class="form-control" value="0"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th style="width: 80%;">Nominal</th>
                                                <td>Rp.</td>
                                                <td class="text-right">
                                                    <input type="text" name="nominal" id="nominal" class="form-control text-right" onkeyup="sumKembalian()" value="0"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th style="width: 80%;">Kembalian</th>
                                                <td>Rp.</td>
                                                <td class="text-right">
                                                    <label id="txtKembalian">0</label>
                                                    <input type="hidden" name="kembalian" id="kembalian" class="form-control" value="0"/>
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

            <div class="overlay-layer card-rounded bg-dark bg-opacity-5" style="display: none;" id="overlayformCreateTransaksi">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <!-- <input type="hidden" name="submit" value=true> -->
            <!-- <button type="button" class="btn btn-success mr-2" name="submit" value="true" onclick="submitTransaksi()">Submit</button> -->
            <button type="submit" class="btn btn-success mr-2" name="submit" value="true">Submit</button>
            <a href="<?= base_url("transaksi") ?>" class="btn btn-light">Cancel</a>
            <?php if($pesan!=""){ ?>
            <div class="alert alert-danger nobottommargin mt-2">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon-remove-sign"></i> <?= $pesan; ?>
            </div>
            <?php } ?>
        </div>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="menuLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="menuLabel">Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-hover" id="kt_table">
                    <thead>
                        <tr>
                            <th style="max-width: 70px;">No</th>
                            <th style="max-width: 150px;">Jenis</th>
                            <th style="min-width: 200px;">Nama</th>
                            <th style="max-width: 150px;">Harga</th>
                            <th style="max-width: 50px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($data_menu as $data) { ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $data->jenis ?></td>
                            <td><?= $data->makanan ?></td>
                            <td>Rp.<?= number_format($data->harga,0,',','.')  ?></td>
                            <td>
                                <a class="btn btn-primary btn-fw" href="#" onclick="selectMenu(<?= $data->id ?>, '<?= $data->makanan ?>', <?= $data->harga ?>)">
                                    <i class="mdi mdi-check"></i>
                                </a>
                            </td>
                        </tr>
                        <?php $no++; }?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>