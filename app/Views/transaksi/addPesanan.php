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
                                            <th style="width:40%">
                                                Barang
                                            </th>
                                            <th>
                                                Banyak
                                            </th>
                                            <th>
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
                                            <tr>
                                                <td>
                                                </td>
                                                <td class="text-left">
                                                    <div class="form-group">

                                                    </div>
                                                </td>
                                                <td>

                                                </td>

                                                <td>

                                                </td>
                                                <td>

                                                </td>
                                                <td>

                                                </td>

                                                <td class="text-center">

                                                    <a href=""> <i class=" material-icons">delete</i><a>
                                                </td>

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
                                                                <option value="<?= $barangAll['idBarang']; ?>"><?= $barangAll['namaBarang'];  ?>&nbsp||&nbsp <?= rupiah($barangAll['harga']);  ?></option>
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