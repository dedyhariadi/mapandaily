<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Transaksi Baru</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('transaksi/addpesanan'); ?>" method="post">
                            <div class="row mt-5">
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">No. Nota</label>
                                        <input type="text" name="noNota" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Tanggal Terima</label>
                                        <input type="text" autocomplete="off" name="tglTerima" class="form-control tglpicker">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Tanggal Selesai</label>
                                        <input type="text" autocomplete="off" name="tglSelesai" class="form-control tglpicker">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Pelanggan</label>
                                        <!-- <input type="text" name="pelanggan" class="form-control"> -->

                                        <!-- <div class="col-lg-5 col-md-6 col-sm-3"> -->
                                        <select class="menuketik" name="pelanggan">

                                            <?php
                                            foreach ($listPelanggan as $no => $pelangganAll) :
                                            ?>
                                                <option value="<?= $pelangganAll['idPelanggan']; ?>"><?= $pelangganAll['namaPelanggan'] . " &nbsp&nbsp||&nbsp&nbsp " . $pelangganAll['telpon']; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                        <!-- </div> -->
                                    </div>
                                </div>
                                <div class="col-md-4">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Uang Muka</label>
                                        <input type="text" name="uangMuka" autocomplete="off" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Keterangan</label>
                                        <input type="text" name="keterangan" autocomplete="off" class="form-control">
                                        <input type="hidden" name="origin" value="addtransaksi" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">

                                        <button type="submit" class="btn btn-success pull-center">Simpan</button>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>