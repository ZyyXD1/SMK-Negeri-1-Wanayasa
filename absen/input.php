    <link rel="stylesheet" href="style.css">
    <form action="" method="POST">
        <table align="center">
            <td>
                <input type="text" name="absen" placeholder="Masukan Nomor Absen"><br>
                <input type="text" name="nama" placeholder="Masukan Nama"><br>
                <button type="submit" name="SUBMIT">SUBMIT</button>
                <button type="submit" name="LIST">
                    <a href="tampil.php" style="text-decoration: none; color: white;">LIST</a>
                </button>
            </td>
        </table>
    </form>

    <?php
    include('koneksi.php');

    if (isset($_POST["SUBMIT"])) {
        $absen = $_POST["absen"];
        $nama = $_POST["nama"];

        $sql = "INSERT INTO tb_absen (nomor_absen, nama) VALUES ('$absen', '$nama')";
        if (mysqli_query($koneksi, $sql)) {
            echo "DATA BERHASIL DISIMPAN";
        } else {
            echo "GAGAL: " . mysqli_error($koneksi);
        }
    }
    ?>