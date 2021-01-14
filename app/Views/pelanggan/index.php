<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Daftar Pelanggan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="tabel">
                                <thead class="text-primary text-center">

                                    <th style="width:10%">
                                        No
                                    </th>
                                    <th style="width:40%">
                                        Nama Pelanggan
                                    </th>
                                    <th style="width:20%">
                                        Telpon
                                    </th>
                                    <th>
                                        Action
                                    </th>

                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($pelangganAll as $nomor => $listPelanggan) :
                                    ?>
                                        <tr>
                                            <td class="text-center">
                                                <?= $nomor = $nomor + 1; ?>
                                            </td>
                                            <td>
                                                <?= $listPelanggan['namaPelanggan']; ?>
                                            </td>

                                            <td class="text-right">
                                                <?php
                                                helper('fungsiku');
                                                echo telpon($listPelanggan['telpon']);
                                                ?>
                                            </td>
                                            <td class="text-center">

                                                <a href="<?= base_url('pelanggan/hapus') . '/' . $listPelanggan['idPelanggan']; ?>" <i class=" material-icons">delete</i><a>

                                                        <a href="<?= base_url('pelanggan/index') . '/' . $listPelanggan['idPelanggan']; ?>" <i class=" material-icons">edit</i>
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
                                    <label class="bmd-label-floating">Nama Pelanggan</label>
                                    <input type="text" name="namaPelanggan" autocomplete="off" value="<?= $pelangganPilih != '' ? $pelangganPilih['namaPelanggan'] : ''; ?>" class=" form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Telpon / HP</label>
                                    <input type="text" name="telpon" autocomplete="off" value="<?= $pelangganPilih != '' ? $pelangganPilih['telpon'] : ''; ?>" class="form-control">
                                </div>
                            </div>
                            <!-- <h4> -->
                            <div class="col">
                                <?php
                                echo form_submit('simpan', 'Simpan', ['class' => 'btn btn-primary float-left']);
                                ?>
                            </div>

                            <!-- <button type="button" class="btn btn-warning text-light">
                                    <?php

                                    // echo form_submit('submit', 'simpan'); -->
                                    // echo anchor_popup(base_url('barang'), 'Simpan', ['class' => 'text-decoration-none text-light']);
                                    ?>
                                </button>
                            </h4>
                        </div>

                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>