<?php


function tglSimpan($tglambil)
{
    $bulanangka = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
    // $bulanangka = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
    $bulan = explode(' ', $tglambil);
    $bulankirim = $bulanangka[array_search($bulan[1], BULANNAMA)];
    return substr($tglambil, -4) . '-' . $bulankirim . '-' . substr($tglambil, 0, 2);
}


if (!function_exists('tglTampil')) {
    function tglTampil($date)
    {
        date_default_timezone_set('Asia/Jakarta');
        // array hari dan bulan
        $Hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
        $Bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

        // pemisahan tahun, bulan, hari, dan waktu
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl = substr($date, 8, 2);
        $waktu = substr($date, 11, 5);
        $hari = date("w", strtotime($date));

        $result = $tgl != "00" ? $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun : '';

        return $result;
    }
}

function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    $hasil_rupiah = number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}

function telpon($telp)
{

    $banyak = strlen($telp);
    $grup = $banyak / 3;
    $hasil_telpon = "";
    for ($h = 0; $h < $grup; $h++) :
        $hasil_telpon =  $hasil_telpon . substr($telp, $h * 3, 3) . "&nbsp&nbsp&nbsp";
    endfor;

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
