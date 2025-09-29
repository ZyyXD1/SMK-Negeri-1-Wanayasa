<link rel="stylesheet" href="style2.css">
<table align="center">
    <tr>
        <th>
            <button type="submit" name="SUBMIT">
                <a href="input.php" style="text-decoration: none; color: white;">TAMBAH DATA</a>
            </button>
        </th>
        <th colspan="1"></th>
    </tr>
    <tr>
        <th>NOMOR ABSEN</th>
        <th>NAMA</th>
        <th colspan="3">A</th>
    </tr>

    <?php
    include "koneksi.php";

    $ambildata = mysqli_query($koneksi, "SELECT * FROM tb_absen");
    while ($tampil = mysqli_fetch_array($ambildata)) {
        echo "
        <tr>
        <td>$tampil[nomor_absen]</td>
        <td>$tampil[nama]</td>
        <td> <a href='?kode=$tampil[nomor_absen]'>HAPUS</a></td>
        <td> <a href='update.php?kode=$tampil[nama]'>UBAH</a></td>
        <tr>";
    }
    ?>
    <?php
    include "koneksi.php";

    if (isset($_GET['kode'])) {
        mysqli_query($koneksi, "delete  from tb_absen where nomor_absen='$_GET[kode]'");

        echo "Data berhasil dihapus";
        echo "<meta http-equiv=refresh content=2;URL='tampil.php'>";
    }
    ?>