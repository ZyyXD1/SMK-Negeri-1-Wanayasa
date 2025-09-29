    <link rel="stylesheet" href="style.css">
    <form action="" method="POST">
        <table align="center">
            <td>
                <input type="text" name="nama" placeholder="Ubah Nama"><br>
                <button type="submit" name="SUBMIT">SUBMIT</button>
                <button type="submit" name="LIST">
                    <a href="tampil.php" style="text-decoration: none; color: white;">LIST</a>
                </button>
            </td>
        </table>
    </form>

    <?php
    include('koneksi.php');

    if (isset($_GET['kode'])) {
        $nama_lama = $_GET['kode'];
        $result = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE nama='$nama_lama'");
        $row = mysqli_fetch_assoc($result);
        if (!$row) {
            echo "<p style='color:red; text-align:center;'>Data tidak ditemukan.</p>";
            exit;
        }
    } else {
        echo "<p style='color:red; text-align:center;'>Nama tidak ditemukan.</p>";
        exit;
    }

    if (isset($_POST["SUBMIT"])) {
        $nama_baru = $_POST["nama"];
        $sql = "UPDATE tb_absen SET nama='$nama_baru' WHERE nama='$nama_lama'";
        if (mysqli_query($koneksi, $sql)) {
            echo "<p style='color:green; text-align:center;'>DATA BERHASIL DIUPDATE</p>";
            echo "<meta http-equiv=refresh content=1;URL='tampil.php'>";
        } else {
            echo "<p style='color:red; text-align:center;'>GAGAL: " . mysqli_error($koneksi) . "</p>";
        }
    }
    ?>