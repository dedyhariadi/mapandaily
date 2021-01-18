<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Tambah pesanan</h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">No. Nota</label>
                                        <input type="text" class="form-control" disabled value="<?= $tampilTransaksi['noNota']; ?>">
                                        <input type="hidden" name="idTransaksi" value="<?= $tampilTransaksi['idTransaksi']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Tgl Terima</label>
                                        <input type="text" class="form-control" disabled value="<?= tglTampil($tampilTransaksi['tglTerima']); ?>">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Tgl Selesai</label>
                                        <input type="email" class="form-control" disabled value="<?= tglTampil($tampilTransaksi['tglSelesai']); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Uang Muka</label>
                                        <input type="text" class="form-control" disabled value="Rp <?= rupiah($tampilTransaksi['uangMuka']); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Pelanggan</label>
                                        <input type="text" class="form-control" disabled value="<?= $pelanggan['namaPelanggan']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Keterangan</label>
                                        <input type="text" class="form-control" disabled value="<?= $tampilTransaksi['keterangan']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-hover mt-5 table-sm">
                                        <thead class="text-primary text-center">

                                            <th>
                                                No
                                            </th>
                                            <th style="width:35%">
                                                Barang
                                            </th>
                                            <th style="width:5%">
                                                Banyak
                                            </th>
                                            <th style="width:15%">
                                                Harga
                                            </th>
                                            <th>
                                                Total
                                            </th>
                                            <th>
                                                Keterangan
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($listPesanan)) :
                                                // $total = 0;
                                                // $jumlah = 0;
                                                foreach ($listPesanan as $nomor => $daftarPesanan) :
                                            ?>
                                                    <tr>
                                                        <td>
                                                            <?= $nomor + 1; ?>
                                                        </td>
                                                        <td class="text-left">
                                                            <?= $daftarPesanan['namaBarang']; ?>
                                                        </td>
                                                        <td class="text-right">
                                                            <?= $daftarPesanan['jumlah'] . " Pcs"; ?>
                                                        </td>
                                                        <td class="text-right">
                                                            <?= rupiah($daftarPesanan['hargaPesanan']); ?>
                                                        </td>
                                                        <td class="text-right">
                                                            <?php
                                                            echo rupiah((int)$daftarPesanan['hargaPesanan'] * (int)$daftarPesanan['jumlah']);
                                                            $jumlah[] = (int)$daftarPesanan['hargaPesanan'] * (int)$daftarPesanan['jumlah'];
                                                            ?>
                                                        </td>
                                                        <td class="text-left">
                                                            <?= $daftarPesanan['keterangan']; ?>

                                                        </td>

                                                        <td class="text-center">
                                                            <a href="<?= base_url('transaksi/hapusPesanan') . '/' . $daftarPesanan['idPesanan'] . '/' . $daftarPesanan['transaksiId']; ?>"> <i class=" material-icons">delete</i><a>
                                                        </td>
                                                    </tr>
                                            <?php
                                                // $jumlah;
                                                endforeach;
                                            endif;
                                            ?>
                                            <tr>
                                                <td colspan="4" class="text-right font-weight-bold">
                                                    Jumlah
                                                </td>
                                                <td class="text-right font-weight-bold">
                                                    <?php
                                                    echo isset($jumlah) ? rupiah(array_sum($jumlah)) : '';
                                                    ?>
                                                </td>
                                                <td colspan="2"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-right font-weight-bold">
                                                    Uang Muka
                                                </td>
                                                <td class="text-right font-weight-bold">
                                                    <?php
                                                    // $uangMuka=
                                                    echo rupiah($tampilTransaksi['uangMuka']); ?>
                                                </td>
                                                <td colspan="2"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-right font-weight-bold">
                                                    Sisa
                                                </td>
                                                <td class="text-right font-weight-bold">
                                                    <?= isset($jumlah) ? rupiah(array_sum($jumlah) - $tampilTransaksi['uangMuka']) : ''; ?>
                                                </td>
                                                <td colspan="2"></td>
                                            </tr>
                                            <tr class="mt-5 py-5">
                                                <td colspan="7">
                                                    <div class="form-group">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                </td>
                                                <td class="text-left">
                                                    <div class="form-group">
                                                        <select class="menuketik" name="idBarang" id="barang">
                                                            <?php
                                                            foreach ($listBarang as $no => $barangAll) :
                                                            ?>
                                                                <option value="<?= $barangAll['idBarang']; ?>"><?= $barangAll['namaBarang'];  ?>&nbsp||&nbsp <?= rupiah($barangAll['hargaBarang']);  ?></option>
                                                            <?php
                                                            endforeach;
                                                            ?>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Jumlah</label>
                                                        <input type="text" name="jumlah" autocomplete="off" class="form-control">
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating" id="harga">Harga Satuan</label>
                                                        <input type="text" name="hargaSatuan" autocomplete="off" class="form-control">
                                                    </div>
                                                </td>

                                                <td colspan="2">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Keterangan</label>
                                                        <input type="text" name="keterangan" autocomplete="off" class="form-control">
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary pull-right">Tambahkan Pesanan</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>