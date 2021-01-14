<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Daftar Transaksi</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="tabel">
                                <thead class="text-primary text-center">

                                    <th>
                                        #
                                    </th>
                                    <th>
                                        No. Nota
                                    </th>
                                    <th>
                                        Tgl Terima
                                    </th>
                                    <th>
                                        Tgl Selesai
                                    </th>
                                    <th>
                                        Pelanggan
                                    </th>
                                    <th>
                                        Total Tagihan
                                    </th>
                                    <th>
                                        Uang Muka
                                    </th>
                                    <th>
                                        Status Pesanan
                                    </th>
                                    <th>
                                        Action
                                    </th>


                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($transaksiAll as $nomor => $listTransaksi) :
                                    ?>
                                        <tr>
                                            <td class="text-center">
                                                <?= $nomor = $nomor + 1; ?>
                                            </td>
                                            <td>
                                                <?= $listTransaksi['noNota']; ?>
                                            </td>
                                            <td>
                                                <?= $listTransaksi['tglTerima']; ?>
                                            </td>
                                            <td>
                                                <?= $listTransaksi['tglSelesai']; ?>
                                            </td>
                                            <td>
                                                <?= $listTransaksi['pelangganId']; ?>
                                            </td>
                                            <td>
                                                <?= $listTransaksi['uangMuka']; ?>
                                            </td>
                                            <td>
                                                <?= $listTransaksi['statusPesananId']; ?>
                                            </td>

                                            <td class="text-right">
                                                <?php
                                                helper('fungsiku');
                                                // echo telpon($listTransaksi['telpon']);
                                                ?>
                                            </td>
                                            <td class="text-center">

                                                <a href="<?= base_url('transaksi/hapus') . '/' . $listTransaksi['idTransaksi']; ?>" <i class=" material-icons">delete</i><a>

                                                        <a href="<?= base_url('transaksi/index') . '/' . $listTransaksi['idTransaksi']; ?>" <i class=" material-icons">edit</i>
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
                        <div class="col">
                            <?php
                            echo anchor(base_url('transaksi/addtransaksi'), 'transaksi baru', ['class' => 'btn btn-primary float-right']);
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>