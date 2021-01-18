<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Data Produk</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="tabel">
                                <thead class="text-primary text-center">

                                    <th style="width:10%">

                                        No
                                    </th>
                                    <th style="width:40%">
                                        Nama Barang
                                    </th>
                                    <th style="width:20%" colspan="2">
                                        Harga
                                    </th>
                                    <th>
                                        Action
                                    </th>

                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($barangAll as $nomor => $listBarang) :
                                    ?>
                                        <tr>
                                            <td class="text-center">
                                                <?= $nomor = $nomor + 1; ?>
                                            </td>
                                            <td>
                                                <?= $listBarang['namaBarang']; ?>
                                            </td>
                                            <td class="text-right">
                                                Rp
                                            </td>
                                            <td class="text-right">
                                                <?php
                                                helper('fungsiku');
                                                echo rupiah($listBarang['hargaBarang']);
                                                ?>
                                            </td>
                                            <td class="text-center">

                                                <a href="<?= base_url('barang/hapus') . '/' . $listBarang['idBarang']; ?>" <i class=" material-icons">delete</i><a>

                                                        <a href="<?= base_url('barang/index') . '/' . $listBarang['idBarang']; ?>" <i class=" material-icons">edit</i>
                                                            <a>

                                                                <!-- <i class="material-icons">edit</i> -->
                                            </td>

                                        </tr>
                                    <?php
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>


                <?= form_open(); ?>
                <div class="card mt-5">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Tambah data</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nama Barang</label>
                                    <input type="text" name="namaBarang" autocomplete="off" value="<?= $barangPilih != '' ? $barangPilih['namaBarang'] : ''; ?>" class=" form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Harga</label>
                                    <input type="text" name="hargaBarang" autocomplete="off" value="<?= $barangPilih != '' ? $barangPilih['hargaBarang'] : ''; ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col">
                                <?php
                                echo form_submit('simpan', 'Simpan', ['class' => 'btn btn-primary float-left']);
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>