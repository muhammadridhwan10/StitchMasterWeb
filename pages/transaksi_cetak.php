<?php
session_start();
ob_start();

// Panggil koneksi database.php untuk koneksi database
include '../koneksi.php';


// ambil data hasil submit dari form
$id = $_GET['id'];

if (isset($_GET['id'])) {
    $no    = 1;
    // fungsi query untuk menampilkan data dari tabel Barang keluar
    $query = mysqli_query($mysqli, "SELECT models.id, models.name, models.material, tbl_penjahit.nama, 
    tbl_penjahit.email, transaksis.id, transaksis.kode_trx, transaksis.created_at, 
    transaksis.detail_ukuran, transaksis.total_harga, transaksis.total_item, transaksis.phone, transaksis.no_antrian FROM models JOIN tbl_penjahit
     ON models.id_penjahit = tbl_penjahit.id_penjahit LEFT JOIN transaksis ON 
     transaksis.id = models.id WHERE transaksis.id ='$id'") 
                                    or die('Ada kesalahan pada query tampil Transaksi : '.mysqli_error($mysqli));
    $count  = mysqli_num_rows($query);
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Stitch</title>
        <link rel="stylesheet" type="text/css" href="asset/bootstrap/css/laporan.css" />
    </head>
    <body>
        <br>
        <br>
        <div id="title" align="center">
            LAPORAN DATA PESANAN 
        </div>
        
        <hr><br>
        <div id="isi">
            <table width="100%" border="0.3" cellpadding="0" cellspacing="0">
                <thead style="background:#e8ecee">
                    <tr class="tr-title">
                        <th height="20" align="center" valign="middle">NO.</th>
                        <th height="20" align="center" valign="middle">KODE TRANSAKSI</th>
                        <th height="20" align="center" valign="middle">TANGGAL</th>
                        <th height="20" align="center" valign="middle">MODEL</th>
                        <th height="20" align="center" valign="middle">BAHAN</th>
                        <th height="20" align="center" valign="middle">NAMA PENJAHIT</th>
                        <th height="20" align="center" valign="middle">EMAIL PENJAHIT</th>
                        <th height="20" align="center" valign="middle">NO TELEPON PEMESAN</th>
                        <th height="20" align="center" valign="middle">DETAIL UKURAN (LB,LP,LBU,PL,PB)</th>
                        <th height="20" align="center" valign="middle">TOTAL ITEM</th>
                    </tr>
                </thead>
                <tbody>
<?php
    // jika data ada
    if($count == 0) {
        echo "  <tr>
                    <td width='40' height='13' align='center' valign='middle'></td>
                    <td width='120' height='13' align='center' valign='middle'></td>
                    <td width='120' height='13' align='center' valign='middle'></td>
                    <td width='80' height='13' align='center' valign='middle'></td>
                    <td width='80' height='13' align='center' valign='middle'></td>
                    <td width='40' height='13' align='center' valign='middle'></td>
                    <td width='120' height='13' align='center' valign='middle'></td>
                    <td style='padding-left:5px;' width='155' height='13' valign='middle'></td>
                    <td style='padding-left:5px;' width='155' height='13' valign='middle'></td>
                    <td style='padding-left:5px;' width='155' height='13' valign='middle'></td>
                </tr>";
    }
    // jika data tidak ada
    else {
        // tampilkan data
        while ($data = mysqli_fetch_assoc($query)) {
            $tanggal       = $data['created_at'];
            $tglformat = date('d-m-Y', strtotime($tanggal));



            // menampilkan isi tabel dari database ke tabel di aplikasi
            echo "  <tr>
                        <td width='40' height='13' align='center' valign='middle'>$no</td>
                        <td width='120' height='13' align='center' valign='middle'>$data[kode_trx]</td>
                        <td width='120' height='13' align='center' valign='middle'>$tglformat</td>
                        <td width='80' height='13' align='center' valign='middle'>$data[name]</td>
                        <td width='80' height='13' align='center' valign='middle'>$data[material]</td>
                        <td width='40' height='13' align='center' valign='middle'>$data[nama]</td>
                        <td width='120' height='13' align='center' valign='middle'>$data[email]</td>
                        <td width='80' height='13' align='center' valign='middle'>$data[phone]</td>
                        <td width='80' height='13' align='center' valign='middle'>$data[detail_ukuran]</td>
                        <td width='80' height='13' align='center' valign='middle'>$data[total_item]</td>
                    </tr>";
            $no++;
        }
    }
?>	
                </tbody>
            </table>

            <br>
            <br>
            <br>
            <div id="footer-tanggal">
                KETERANGAN :
            </div>
            <br>
            <div id="footer-tanggal">
                LB  = Lingkar Badan
            </div>
            <br>
            <div id="footer-tanggal">
                LP  = Lingkar Pinggang
            </div>
            <br>
            <div id="footer-tanggal">
                LBU = Lingkar Bahu
            </div>
            <br>
            <div id="footer-tanggal">
                PL  = Panjang Lengan
            </div>
            <br>
            <div id="footer-tanggal">
                PB  = Panjang Baju 
            </div>
            <br>
            <br>
            <div id="footer-tanggal">
                Mohon Segera Untuk Melakukan Pembuatan Pakaian Sesuai Data Di Atas 
            </div>
        </div>

        <!-- Script Untuk Print Laporan -->
        <script>
		window.print();
	    </script>

    </body>
</html><!-- Akhir halaman HTML yang akan di konvert -->