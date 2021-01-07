<?php


function tgltekstoangka($tglambil)
{
    $bulanangka = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
    $bulan = explode(' ', $tglambil);
    $bulankirim = $bulanangka[array_search($bulan[1], BULANNAMA)];
    return substr($tglambil, 0, 2) . $bulankirim . substr($tglambil, -2);
}

function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    $hasil_rupiah = number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}

function telpon($angka)
{

    // $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    $hasil_telpon = number_format($angka, 0, ',', '.');
    return $hasil_telpon;
}

function ctktanggal($tgl)
{
    $tanggal = substr($tgl, 0, 2);

    switch (substr($tgl, 2, 2)) {
        case '01':
            $bulan = "Januari";
            break;
        case '02':
            $bulan = "Februari";
            break;
        case '03':
            $bulan = "Maret";
            break;
        case '04':
            $bulan = "April";
            break;
        case '05':
            $bulan = "Mei";
            break;
        case '06':
            $bulan = "Juni";
            break;
        case '07':
            $bulan = "Juli";
            break;
        case '08':
            $bulan = "Agustus";
            break;
        case '09':
            $bulan = "September";
            break;
        case '10':
            $bulan = "Oktober";
            break;
        case '11':
            $bulan = "November";
            break;
        case '12':
            $bulan = "Desember";
            break;
        default:
            $bulan = "Bulan tidak teridentifikasi";
    }
    $tahun = '20' . substr($tgl, -2, 2);
    $ctktgl = $tanggal . ' ' . $bulan . ' ' . $tahun;
    return $ctktgl;
}
